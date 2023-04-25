@extends('layouts.connect')
@section('title', 'Oratorio Feed')
@section('description', 'Empowering and growing your networks with influencers and by mentors')
@section('keywords', 'empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/feeds')
@section('content')
<link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const controls = [
            'play-large',
            'play',
            'progress',
            'duration',
            'download',
            'fullscreen'
        ];
        const player = Plyr.setup('.js-player', {
            controls
        });
    });
</script>
<div class="main_content">
    <div class="mcontainer">
        <div class="profile is_page">
            <div class="profiles_banner">
                <img src="{{ asset('asset/images/group/orat_banner.png') }}" title="oratorio event banner" alt="oratorio event banner">
            </div>
            <div class="profiles_content">
                <div class="profile_avatar">
                    <div class="profile_avatar_holder">
                        <img src="{{ asset('head_icon.png') }}" alt="oratorio icon">
                    </div>
                    <div class="icon_change_photo" hidden> <ion-icon name="camera" class="text-xl"></ion-icon> </div>
                </div>
                <div class="profile_info">
                    <h1> Oratorio Music Foundation</h1>
                    <p> Musical group · {{ $count_users }} members</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center -space-x-4">
                        @foreach($latest_members as $latest_member)
                        <img src="{{ asset($latest_member->profile_photo_url) }}" alt="{{ $latest_member->name }}" title="{{ $latest_member->name }}" class="w-10 h-10 rounded-full border-2 border-white">
                        @endforeach
                        <div class="w-10 h-10 rounded-full flex justify-center items-center bg-red-100 text-red-500 font-semibold"> {{ $count_users }}+
                        </div>
                    </div>
                    <a href="#" class="flex items-center justify-center h-9 px-5 rounded-md bg-green-600 text-white  space-x-1.5">
                        <ion-icon name="thumbs-up"></ion-icon>
                        <span> More </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="md:flex md:space-x-6 lg:mx-16">
            <div class="space-y-5 flex-shrink-0 md:w-7/12">
                <div class="card lg:mx-0 p-4" uk-toggle="target: #create-post-modal">
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <x-validation-errors class="mb-1" />
                    <div class="flex space-x-3">
                        <img src="{{ asset(auth()->user()->profile_photo_url) }}" class="w-10 h-10 rounded-full">
                        <input placeholder="Share your thought, {{ auth()->user()->name }}!" class="bg-red-100 hover:bg-red-200 flex-1 h-10 px-6 rounded-full">
                    </div>
                    <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                        <div class="hover:bg-red-100 flex items-center p-1.5 rounded-md cursor-pointer">
                            <svg class="bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block" data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Audios
                        </div>
                        <div class="hover:bg-red-100 flex items-center p-1.5 rounded-md cursor-pointer">
                            <svg class="bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block" uk-tooltip="title: Messages ; pos: bottom ;offset:7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" title="" aria-expanded="false">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Videos
                        </div>
                        <div class="hover:bg-red-100 flex items-center p-1.5 rounded-md cursor-pointer">
                            <svg class="bg-red-100 h-9 mr-2 p-1.5 rounded-full text-red-600 w-9 -my-0.5 hidden lg:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Jobs
                        </div>
                    </div>
                </div>
                @foreach($posts as $post)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="{{ $post->user->profile_photo_url }}" title="{{ $post->user->name }}" alt="{{ $post->user->name }}" class="bg-red-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="#" class="text-green-600 dark:text-red-100"> {{ $post->user->name }} </a>
                                <div class="text-red-700 flex items-center space-x-2"> {{ $post->created_at->diffForHumans() }} <ion-icon name="people"></ion-icon></div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i class="icon-feather-more-horizontal text-2xl hover:bg-red-200 rounded-full p-2 transition -mr-1 dark:hover:bg-red-700"></i> </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-red-500 hidden text-base border border-red-100 dark:bg-red-900 dark:text-red-100 dark:border-red-700" uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                                <ul class="space-y-1">
                                    <li>
                                        <a href="https://wa.me/?url={{ route('post.show', $post) }}&amp;text={{ $post->content }}&amp;text=By {{ $post->user->name }}" target="_blank" class="flex items-center px-3 py-2 hover:bg-red-200 hover:text-red-800 rounded-md dark:hover:bg-red-800">
                                            <i class="uil-share-alt mr-1"></i> Share
                                        </a>
                                    </li>
                                    @if(auth()->user()->id === $post->user_id)
                                    <!-- <li>                                         
                                        <a href="#" uk-toggle="target: #edit-post-modal" class="flex items-center px-3 py-2 hover:bg-red-200 hover:text-red-800 rounded-md dark:hover:bg-red-800" data-url="{{ route('post.edit', $post->id) }}">
                                            <i class="uil-edit-alt mr-1"></i> Edit Post
                                        </a>
                                    </li> -->
                                    <li>
                                        <form action="{{ route('post.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600" onclick="return confirm('Hey, {{ auth()->user()->name }} Are you sure about this?');">
                                                <span class="uil-trash-alt mr-1"></span> Delete </button>
                                        </form>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0 border-b dark:border-green-700">

                        {!! $post->content !!}

                    </div>
                    @if($post->images)
                    <div uk-lightbox>
                        <div class="grid grid-cols-2 gap-2 px-5">
                            @foreach ($post->images as $image)
                            @php
                            $extension = pathinfo($image->path, PATHINFO_EXTENSION);
                            @endphp
                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <a href="{{ asset('storage/' . $image->path) }}" class="relative">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $post->user->name }}" class="rounded-md w-full h-full">
                            </a>
                            @elseif (in_array($extension, ['mp4', 'ogg', 'webm']))
                            <video width="320" height="240" controls>
                                <source src="{{ asset('storage/' . $image->path) }}" type="video/{{ $extension }}">
                                Your browser does not support the video tag.
                            </video>
                            @elseif (in_array($extension, ['mp3', 'wav', 'ogg']))
                            <!-- <audio controls> -->
                            <audio class="js-player">
                                <source src="{{ asset('storage/' . $image->path) }}" type="audio/{{ $extension }}">
                                Your browser does not support the audio element.
                            </audio>
                            @else
                            <p>Unsupported file type: {{ $extension }}</p>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @include('partials._likeCommentShare')
                </div>
                @endforeach
            </div>
            <div class="w-full flex-shirink-0">

                <div class="card p-5 mb-5">

                    <h1 class="block text-lg font-bold"> About Oratorio Connect </h1>

                    <div class="space-y-4 mt-3">

                        <div class="flex items-center space-x-3">
                            <ion-icon name="alert-circle" class="bg-red-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div> Empowering and growing your networks with influencers and by mentors </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <ion-icon name="thumbs-up" class="bg-red-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div class="font-semibold"> {{ $count_users }} people connected </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <ion-icon name="mail-open" class="bg-red-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div> <a href="#" class="text-green-500">help@oratoriogroup.org</a> </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <ion-icon name="albums" class="bg-red-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div> <a href="#" class="text-green-500">Music/Concert/Seminar/Jobs/Product<br>/Service/Leadership</a> </div>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="widget card p-5 border-t">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-lg font-semibold"> Recents Events </h4>
                        </div>
                        <a href="#" class="text-green-600 "> See all</a>
                    </div>
                    <div>
                        @forelse($events as $event)
                        <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-red-50">
                            <a href="{{ route('post.show', $post) }}" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                                <img src="{{ asset('storage/' . $event->images[0]->path) }}" class="absolute w-full h-full inset-0 " alt="">
                            </a>
                            <div class="flex-1">
                                <a href="{{ route('post.show', $event) }}" class="text-base font-semibold capitalize">{{ $event->title }} </a>
                                <div class="text-sm text-red-500 mt-0.5"> {{ $event->views }} in attendance</div>
                            </div>
                            <a href="{{ route('post.show', $post) }}" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-green-500 text-white">
                                More
                            </a>
                        </div>
                        @empty
                        <div class="text-sm text-blue-500 mt-0.5"> Coming soon!</div>
                        @endforelse

                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-lg font-semibold"> Recents Jobs </h4>
                        </div>
                        <a href="#" class="text-green-600 "> See all</a>
                    </div>
                    <div>
                        @forelse($jobs as $job)
                        <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-red-50">
                            <a href="{{ route('post.show', $job) }}" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                                <img src="{{ asset('storage/' . $job->images[0]->path) }}" class="absolute w-full h-full inset-0 " alt="">
                            </a>
                            <div class="flex-1">
                                <a href="{{ route('post.show', $job) }}" class="text-base font-semibold capitalize">{{ $job->title }} </a>
                                <div class="text-sm text-red-500 mt-0.5"> {{ $job->views }} applied</div>
                            </div>
                            <a href="{{ route('post.show', $job) }}" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-green-500 text-white">
                                More
                            </a>
                        </div>
                        @empty
                        <div class="text-sm text-blue-500 mt-0.5"> Coming soon!</div>
                        @endforelse

                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-lg font-semibold"> Influencers </h4>
                        </div>
                        <a href="#" class="text-green-600 "> See all</a>
                    </div>
                    <div>
                        @forelse($influencers as $influencer)
                        <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-red-50">
                            <a href="{{ route('post.show', $latest_member) }}" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                                <img src="{{ asset($latest_member->profile_photo_url) }}" class="absolute w-full h-full inset-0 " alt="">
                            </a>
                            @php $isConnecting = $influencer->connectors()->where('user_id', auth()->user()->id)->exists(); @endphp
                            <div class="flex-1">
                                <a href="" class="text-base font-semibold capitalize">{{ $influencer->name }} </a>
                                <div class="text-sm text-red-500 mt-0.5"> {{ $influencer->connectors->count() }} connected </div>
                            </div>
                            @if(!$isConnecting)
                            <form action="{{ route('users.connect') }}" method="POST">
                                @csrf
                                <input value="{{ $influencer->id }}" name="connected_to" type="hidden">
                                <button type="submit" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-green-500 text-white">Connect</button>
                                @else
                                <input value="{{ $influencer->id }}" name="connected_to" type="hidden">
                                <button type="submit" class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold bg-red-500 text-white">Disconnect</button>
                            </form>
                            @endif
                        </div>
                        @empty
                        <div class="text-sm text-blue-500 mt-0.5"> Coming soon!</div>
                        @endforelse
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-lg font-semibold"> Single Tracks </h4>
                        </div>
                        <a href="#" class="text-green-600 "> See all</a>
                    </div>
                    <div>
                        @if($sideSingleTrack->count() >= 1)
                        @forelse ($sideSingleTrack as $audio)
                        <x-side :audio="$audio" />
                        @empty
                        <div class="text-sm text-blue-500 mt-0.5">Coming soon!</div>
                        @endforelse
                        @endif
                    </div>

                    <br>
                    <hr>
                    <br>
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-lg font-semibold"> BeSpoke </h4>
                        </div>
                        <a href="#" class="text-green-600 "> See all</a>
                    </div>
                    <div>
                        @if($sideSingleTrack->count() >= 1)
                        @forelse ($sideBespokes as $audio)
                        <x-side :audio="$audio" />

                        @empty
                        <div class="text-sm text-blue-500 mt-0.5"> Coming soon!</div>
                        @endforelse
                        @endif
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-lg font-semibold"> Podcast </h4>
                        </div>
                        <a href="#" class="text-green-600 "> See all</a>
                    </div>
                    <div>
                        @if($sidePodcast->count() >= 1)
                        @forelse ($sidePodcast as $audio)
                        <x-side :audio="$audio" />
                        @empty
                        <div class="text-sm text-blue-500 mt-0.5"> Coming soon!</div>
                        @endforelse
                        @endif
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-lg font-semibold"> Sermon </h4>
                        </div>
                        <a href="#" class="text-green-600 "> See all</a>
                    </div>
                    <div>
                        @if($sideSermon->count() >= 1)
                        @forelse ($sideSermon as $audio)
                        <x-side :audio="$audio" />

                        @empty
                        <div class="text-sm text-blue-500 mt-0.5"> Coming soon!</div>
                        @endforelse
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="edit-post-modal" class="edit-post is-story" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">
        <div class="text-center py-3 border-b">
            <h3 class="text-lg font-semibold"> Edit Post </h3>
            <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
        </div>
        <form id="edit-post-form" action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-1 items-start space-x-4 p-5">
                <img src="{{ asset(auth()->user()->profile_photo_url) }}" class="bg-gray-200 border border-white rounded-full w-11 h-11">
                <div class="flex-1 pt-2">
                    <textarea name="content" class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none" rows="5" placeholder="Share your thought, {{ auth()->user()->name }}!"> {{ $post->content }}</textarea>
                </div>
            </div>
            <div uk-form-custom class="w-full py-3">
                <div class="bg-green-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-green-800 dark:border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">
                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                    </svg>
                </div>
                <input type="file" name="image[]" accept="file/*" multiple>
            </div>
            <div class="flex items-center w-full justify-between border-t p-3">
                <select type="hidden" name="category_id" class="selectpicker mt-2 story">
                    @if(auth()->user()->role === 'admin')
                    <option value="BeSpoke">BeSpoke</option>
                    <option value="Podcast">Podcast</option>
                    <option value="Sermon">Sermon</option>
                    <option value="SingleTrack">SingleTrack</option>
                    <option value="Event">Event</option>
                    <option value="Job">Job</option>                     
                    @else
                    <option value="thought" selected>Thought</option>
                    @endif
                </select>

                <div class="flex space-x-2">
                    <button type="submit" class="bg-red-100 flex font-medium h-9 items-center justify-center px-5 rounded-md text-red-600 text-sm">
                        <svg class="h-5 pr-1 rounded-full text-red-500 w-6 fill-current" id="veiw-more" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="false" style="">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg> Share </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function() {
        $('[data-url]').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            $('#edit-post-form').attr('action', url);
            UIkit.modal('#edit-post-modal').show();
        });
    });
</script>

<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const player = Plyr.setup('.js-player');
    });
</script>

@include('partials._createPost')
@endsection