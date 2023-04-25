<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Media;
use App\Models\Comment;
use App\Models\Postlike;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\ContentNotification;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin'])
            ->except(['index', 'list', 'job', 'event', 'store', 'show', 'like', 'comment', 'uncomment', 'destroy']);
    }

    public function index()
    {
        $posts = Post::with(['images'])->select('id', 'title', 'content', 'created_at', 'category_id', 'views')->paginate(10);
        $medias = Media::select('id', 'type')->latest()->get();
        return view('admin.post.index', compact('posts', 'medias'));
    }

    public function list(Post $post)
    {
        $categoryJob = 'Job';
        $categoryEvent = 'Event';
        $category = Media::where('type', $categoryJob)->firstOrFail();
        $category1 = Media::where('type', $categoryEvent)->firstOrFail();
        $contents = Post::whereIn('category_id', [$category->id, $category1->id])->paginate(10);
        return view('admin.post.list', compact('contents'));
    }
    public function job()
    {

        $categoryType = 'Job';
        $category = Media::where('type', $categoryType)->firstOrFail();

        $medias = Media::select('id', 'type')->latest()->get();
        $jobs = Post::where('category_id', $category->id)->paginate(10);

        return view('admin.post.job', compact('jobs', 'medias'));
    }
    public function event()
    {
        $categoryType = 'Event';
        $category = Media::where('type', $categoryType)->firstOrFail();

        $events = Post::where('category_id', $category->id)->paginate(10);
        $medias = Media::select('id', 'type')->latest()->get();
        return view('admin.post.event', compact('events', 'medias'));
    }

    public function store(PostRequest $request)
    {
        $user = auth()->user();
        $post = new Post();
        $postData = $request->only(['content', 'category_id', 'title']);
        $postData = array_map('strip_tags', $postData);
        $post->fill($postData);
        $content = htmlentities($request->input('content'), ENT_QUOTES, 'UTF-8');
        $post->content = $content;
        $post->user_id = $user->id;
        $post->slug = Str::slug($user->name . '-' . mt_rand(1000000000, 9999999999), '-');

        $post->save();

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('postImages', 'public');
                $postImage = new Image();
                $postImage->path = $path;
                $postImage->post_id = $post->id;
                $postImage->save();
            }
        }

        Notification::route('mail', [
            'oratoriogroup@gmail.com' => 'Alert! New post has been published on the website',
        ])->notify(new ContentNotification($post));

        $users = User::all();
        Notification::send($users, new ContentNotification($post));

        return redirect()->back()->with('status', 'Shared!');
    }

    public function show(Post $post)
    {
        $relateds = Post::where('category_id', 'Job')->where('id', '!=', $post->id)->inRandomOrder()->limit(6)->get();
        $sides = Post::where('category_id', 'Event')->inRandomOrder()->limit(6)->get();
        $comments = Comment::where('post_id', $post->id)->select('content', 'user_id')->latest()->get();
        DB::table('posts')->increment('views');
        return view('admin.post.show', compact('post', 'comments', 'relateds', 'sides'));
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }


    public function update(PostRequest $request, Post $post)
    {

        $user = auth()->user();

        // Check if the authenticated user is the same user who created the post
        if ($post->user_id != $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to update this post.');
        }

        $postData = $request->only(['content', 'category_id', 'title']);
        $postData = array_map('strip_tags', $postData);
        $content = htmlentities($request->input('content'), ENT_QUOTES, 'UTF-8');

        $post->fill($postData);
        $post->content = $content;
        $post->slug = Str::slug($user->name . '-' . mt_rand(1000000000, 9999999999), '-');

        $post->save();

        // Remove existing image if any
        if ($post->image) {
            Storage::disk('public')->delete($post->image->path);
            $post->image->delete();
        }

        // Save new image if any
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('postImages', 'public');
                $postImage = new Image();
                $postImage->path = $path;
                $postImage->post_id = $post->id;
                $postImage->save();
            }
        }

        return redirect(route('post.index'))->with('status', 'Post updated!');
    }

    public function like(Post $post)
    {
        $user = Auth::user();
        $existingLike = Postlike::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            return redirect()->back()->with(['status' => 'Unlike.'], 422);
        }
        $like = new Postlike();
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->save();
        return redirect()->back()->with(['status' => 'Like.']);
    }


    public function comment(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'content' => ['required', 'string', 'max:255', 'not_regex:/^.*(kill|death|blood|fool|stupid|sex|hate).*$/i'],
            'post_id' => ['required', 'integer', 'max:255'],
        ]);
        $user = Auth::user();
        $content = htmlentities($validatedData['content'], ENT_QUOTES, 'UTF-8');
        $comment = new Comment();
        $comment->content = $content;
        $comment->post_id = $validatedData['post_id'];
        $comment->user_id = $user->id;
        $comment->save();
        return redirect()->back()->with(['status' => 'comment shared.']);
    }

    public function uncomment(Post $post)
    {
        $user = Auth::user();
        $existingComment = Comment::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existingComment) {
            $existingComment->delete();
            return redirect()->back()->with(['status' => 'Deleted.'], 422);
        }
    }

    public function destroy(Post $post)
    {
        // Delete associated images from storage
        foreach ($post->images as $image) {
            Storage::delete('public/' . $image->path);
        }
        $post->images()->delete();
        $post->delete();    
        return redirect()->back()->with('status', 'Post and associated images deleted successfully');
    }
     
    public function destroyMedia(Media $media)
    {

        $media->delete();
        return redirect()->back()->with('status', 'Delete');
    }
}
