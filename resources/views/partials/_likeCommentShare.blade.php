<div class="p-4 space-y-3">
    <div class="flex space-x-4 lg:font-bold">
        @php
        $liked = $post->likes()->where('user_id', auth()->user()->id)->exists();
        @endphp
        <form action="{{ route('posts.like', $post) }}" method="POST">
            @csrf
            @if (!$liked)
            <button type="submit" class="flex items-center space-x-2">
                <div class="p-2 rounded-full  text-green-600 lg:bg-green-100 bg-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="green:text-green-100">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                    </svg>
                </div>
                <div> {{ $post->likes->count() }} Like </div>
            </button>
            @else
            <button type="submit" class="flex items-center space-x-2 text-red-600">
                <div class="p-2 rounded-full bg-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="green:text-green-100">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                    </svg>
                </div>
                <div> {{ $post->likes->count() }} Like</div>
            </button>
            @endif
        </form>

        @if($post->comments)
        <a href="#" class="flex items-center space-x-2">
            <div class="p-2 rounded-full  text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-red-100">
                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                </svg>
            </div>
            <div> {{ $post->comments->count() }} Comment</div>
        </a>
        @endif

        <a href="https://wa.me/?url={{ route('post.show', $post) }}&amp;text={{ $post->content }}&amp;text=By {{ $post->user->name }}" target="_blank" class="flex items-center space-x-2 flex-1 justify-end">
            <div class="p-2 rounded-full  text-green-600 ">
                <ion-icon name="logo-whatsapp" style="font-size: 20px;"></ion-icon>
            </div>
            <div> Share</div>
        </a>
    </div>
    @if($post->likes)
    <div class="flex items-center space-x-3 pt-2">
        <div class="flex items-center">
            @foreach($post->likes->take(1)->reverse() as $like)
            <img src="{{ asset($like->user->profile_photo_url) }}" title="{{ $like->user->name }}" alt="{{ $like->user->name }}" class="w-6 h-6 rounded-full border-2 border-white dark:border-red-900">
            <span class="dark:text-red-100"> Liked by <b>{{ $like->user->name }}</b></span>
            @endforeach
            @if($post->likes->count() > 1)
            <span class="dark:text-red-100">&nbsp;and <b>{{ $post->likes->count()-1 }} others</b> </span>
            @endif
        </div>
    </div>
    @endif
    <div class="border-t py-4 space-y-4 dark:border-red-600">
        @if($post->comments)
        @foreach($post->comments as $comment)
        <div class="flex">
            <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                <img src="{{ asset($comment->user->profile_photo_url) }}" title="{{ $comment->user->name }}" alt="{{ $comment->user->name }}" class="absolute h-full rounded-full w-full">
            </div>
            <div>
                <div class="text-red-700 py-2 px-3 rounded-md bg-red-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-green-800 dark:text-red-100">
                    <p class="leading-6">{{ $comment->content }}
                        <urna class="i uil-heart"></urna> <i class="uil-grin-tongue-wink"> </i>
                    </p>
                    <div class="absolute w-3 h-3 top-3 -left-1 bg-red-100 transform rotate-45 dark:bg-green-800"></div>
                </div>
                <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                    @php
                    $commented = $post->comments()->where('user_id', auth()->user()->id)->exists();
                    @endphp
                    @if ($commented)
                    <form action="{{ route('posts.uncomment', $post) }}" method="POST">
                        @csrf<a href="{{ route('posts.uncomment', $post) }}" class="text-red-600" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="uil-trash"></i> remove </a>
                    </form>
                    @else<a href="#"> <ion-icon name="arrow-redo-circle-outline"></ion-icon> Reply </a>@endif
                    <span> {{ $comment->created_at->diffForHumans() }} </span>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="bg-red-100 rounded-full relative dark:bg-red-800 border-t">
        <form action="{{ route('posts.comment', $post) }}" method="POST" class="d-flex justify-content-between">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <input name="content" placeholder="Add your comment..." class="bg-transparent max-h-10 shadow-none px-5">

            <button type="submit"> <ion-icon name="send-outline" style="font-size: 20px;" class="hover:bg-green-200 p-0.5 rounded-full text-red-600"></ion-icon> </button>
        </form>
    </div>
</div>