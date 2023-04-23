<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Post $post)
    {
        $medias = Media::select('id', 'type')->latest()->get();


        // $Single = Media::where('type', 'Single Track')->firstOrFail();
        // $sideSingleTrack = Post::with('images')->select('id', 'title', 'views')->where('category_id', $Single->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);
        $sideSingleTrack = Cache::remember('sideSingleTrack', 1209600, function () {
            $Single = Media::where('type', 'Single Track')->firstOrFail();
            return Post::with('images')->select('id', 'title', 'views')
                ->where('category_id', $Single->id)
                ->inRandomOrder()
                ->limit(10)
                ->get(['id', 'title', 'slug', 'views']);
        });

        $BeSpoke = Media::where('type', 'BeSpoke')->firstOrFail();
        // $sideBespokes = Post::with('images')->select('id', 'title', 'views')->where('category_id', $BeSpoke->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);
        $sideBespokes = Cache::remember('side_bespokes', 1209600, function () use ($BeSpoke) {
            return Post::with('images')
                ->select('id', 'title', 'views')
                ->where('category_id', $BeSpoke->id)
                ->inRandomOrder()
                ->limit(10)
                ->get(['id', 'title', 'slug', 'views']);
        });

        // $Podcast = Media::where('type', 'Podcast')->firstOrFail();
        // $sidePodcast = Post::with('images')->select('id', 'title', 'views')->where('category_id', $Podcast->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);

        $cacheKey = 'sidePodcast'; // set a cache key
        $cacheDuration = 60 * 24 * 14; // set a cache duration in minutes (2 weeks)

        $sidePodcast = Cache::remember($cacheKey, $cacheDuration, function () {
            $Podcast = Media::where('type', 'Podcast')->firstOrFail();
            return Post::with('images')->select('id', 'title', 'views')
                ->where('category_id', $Podcast->id)
                ->inRandomOrder()
                ->limit(10)
                ->get(['id', 'title', 'slug', 'views']);
        });


        // $Sermon = Media::where('type', 'Sermon')->firstOrFail();
        // $sideSermon = Post::with('images')->select('id', 'title', 'views')->where('category_id', $Sermon->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);

        $sideSermon = Cache::remember('sideSermon', 1209600, function () {
            $Sermon = Media::where('type', 'Sermon')->firstOrFail();
            return Post::with('images')->select('id', 'title', 'views')->where('category_id', $Sermon->id)->inRandomOrder()->limit(10)->get(['id', 'title', 'slug', 'views']);
        });

        // $Event = Media::where('type', 'Event')->firstOrFail();
        // $events = Post::with(['images'])->select('id', 'title', 'views')->where('category_id', $Event->id)->select('id', 'title', 'slug', 'views')->inRandomOrder()->limit(10)->get();
        $Event = Cache::remember('event_media', 1209600, function () {
            return Media::where('type', 'Event')->firstOrFail();
        });

        $events = Cache::remember('events', 1209600, function () use ($Event) {
            return Post::with('images')
                ->select('id', 'title', 'slug', 'views')
                ->where('category_id', $Event->id)
                ->inRandomOrder()
                ->limit(10)
                ->get();
        });

        // $Job = Media::where('type', 'Job')->firstOrFail();
        // $jobs = Post::with(['images'])->select('id', 'title', 'views')->where('category_id', $Job->id)->select('id', 'title', 'slug', 'views')->inRandomOrder()->limit(10)->get();

        $Job = Media::where('type', 'Job')->firstOrFail();
        $jobs = Cache::remember('jobs', 1209600, function () use ($Job) {
            return Post::with(['images'])->select('id', 'title', 'views')->where('category_id', $Job->id)->select('id', 'title', 'slug', 'views')->inRandomOrder()->limit(10)->get();
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
        return view('dashboard.index', compact('influencers', 'latest_members', 'posts', 'comments', 'count_users', 'jobs', 'events', 'sideSingleTrack', 'sideBespokes', 'sidePodcast', 'sideSermon', 'medias'));
    }
}
