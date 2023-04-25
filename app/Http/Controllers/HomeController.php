<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Post $post)
    {

        // $Single = Media::where('type', 'Single Track')->firstOrFail();
        // $sideSingleTrack = Post::with('images')->select('id', 'title', 'views')->where('category_id', $Single->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);
        // $sideSingleTracks = Cache::remember('sideSingleTracks', 1209600, function () {
        //     return Post::with('images')->select('id', 'title', 'views')
        //         ->where('category_id', 'SingleTrack')
        //         ->inRandomOrder()
        //         ->limit(10)
        //         ->get(['id', 'title', 'slug', 'views']);
        // });

        $sideSingleTrack = DB::table('posts')->with('images')->select('id', 'title', 'views')->where('category', 'SingleTrack')->inRandomOrder()->take(4)->get();
        Cache::put('sideSingleTracks', $sideSingleTrack, now()->addWeeks(2));
        $sideSingleTrack = Cache::get('sideSingleTrack');

        // $sideBespokes = Post::with('images')->select('id', 'title', 'views')->where('category_id', $BeSpoke->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);
        $sideBespokes = Cache::remember('side_bespokes', 1209600, function () {
            return Post::with('images')
                ->select('id', 'title', 'views')
                ->where('category_id', 'BeSpoke')
                ->inRandomOrder()
                ->limit(10)
                ->get(['id', 'title', 'slug', 'views']);
        });

        // $Podcast = Media::where('type', 'Podcast')->firstOrFail();
        // $sidePodcast = Post::with('images')->select('id', 'title', 'views')->where('category_id', $Podcast->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);
 
        $sidePodcast = Cache::remember('sidePodcast', 1209600, function () {
            return Post::with('images')->select('id', 'title', 'views')
                ->where('category_id', 'Podcast')
                ->inRandomOrder()
                ->limit(10)
                ->get(['id', 'title', 'slug', 'views']);
        });


        // $Sermon = Media::where('type', 'Sermon')->firstOrFail();
        // $sideSermon = Post::with('images')->select('id', 'title', 'views')->where('category_id', $Sermon->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);

        $sideSermon = Cache::remember('sideSermon', 1209600, function () {
            return Post::with('images')->select('id', 'title', 'views')->where('category_id', 'Sermon')->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);
        });

        // $Event = Media::where('type', 'Event')->firstOrFail();
        // $events = Post::with(['images'])->select('id', 'title', 'views')->where('category_id', $Event->id)->select('id', 'title', 'slug', 'views')->inRandomOrder()->limit(10)->get();
       
        $events = Cache::remember('events', 1209600, function ()  {
            return Post::with('images')
                ->select('id', 'title', 'slug', 'views')
                ->where('category_id', 'Event')
                ->inRandomOrder()
                ->limit(10)
                ->get();
        });

        // $Job = Media::where('type', 'Job')->firstOrFail();
        // $jobs = Post::with(['images'])->select('id', 'title', 'views')->where('category_id', $Job->id)->select('id', 'title', 'slug', 'views')->inRandomOrder()->limit(10)->get();

        $jobs = Cache::remember('jobs', 1209600, function () {
            return Post::with(['images'])->select('id', 'title', 'views')->where('category_id', 'Job')->select('id', 'title', 'slug', 'views')->inRandomOrder()->limit(10)->get();
        });

        $comments = Comment::where('post_id', $post->id)->select('content', 'user_id')->latest()->get();
        // $posts = Post::with(['images'])->select('id', 'user_id', 'slug', 'content', 'created_at')->inRandomOrder()->limit(20)->get();
        $posts = Cache::remember('random_posts', 60 * 24 * 7, function () {
            return Post::with(['images'])
                ->select('id', 'user_id', 'slug', 'content', 'created_at')
                ->inRandomOrder()
                ->limit(20)
                ->get();
        });

        $count_users = User::select('id')->count();
        $count_influencers = User::select('id')->where('role', 'influencer')->count();
        $influencers = User::select('id', 'name', 'last_name', 'slug', 'profile_photo_url')->where('role', 'influencer')->latest()->get();
        $latest_members = User::select('id', 'slug', 'name', 'last_name', 'community_id', 'profile_photo_url')
            ->where('id', '!=', auth()->user()->id)
            ->where('role', '!=', 'admin')
            ->latest()
            ->limit(7)
            ->get();
        return view('dashboard.index', compact('influencers', 'latest_members', 'posts', 'comments', 'count_users', 'jobs', 'events', 'sideSingleTrack', 'sideBespokes', 'sidePodcast', 'sideSermon'));
    }
}
