@extends('layouts.connect')
@section('title', " Editing $post->name ")
@section('description', 'Empowering content through professional skills and growing your networks with influencers and by mentors')
@section('keywords', 'editing, post, skills, empowerment, ngo, professions, expert, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/post')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('post.index') }}">All Post</a>
                    </li>
                    <li class="active">
                        <a href="#">Add New Post </a>
                    </li>
                </ul>
            </div>
        </div>
        <x-validation-errors class="mb-4" />
        <div class="max-w-2x1 m-auto shadow-md rounded-md bg-white lg:mt-20">
            <div class="text-center border-b border-green-100 py-6">
                <!-- <h3 class="font-bold text-xl"> Edit - {{ $post->category }} </h3> -->
            </div>
            <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-5 space-y-7"><label>Content</label>
                    <textarea role="4" maxlength="2000" id="content" name="content" class=" px-3 py-3 with-border">{{ $post->content }} </textarea>
                </div>
                @if($post->title)
                <div class="p-3 space-y-7">
                    <div class="line">
                        <input class="line__input" type="text" value="{{ $post->title }}" />
                        <span for="title" class="line__placeholder"> Title </span>
                    </div>
                </div>
                @endif

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
                        <audio controls>
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

                <!-- <img src="{{ asset($post->image) }}" alt="{{ $post->name }}" class="rounded-lg" style="max-height: 50px; max-width:50px" srcset=""> -->

                <div class="p-5 space-y-3"><label>Change File</label>
                    <!-- <input type="file" class="line shadow" multiple name="image[]"> -->
                    <input type="file" name="image[]" multiple>
                    <!-- <input type="file" name="image[]" accept="image/jpeg,image/png,image/jpg,image/gif,audio/mp3,audio/wav,audio/ogg,video/mp4,video/webm,video/ogg" > -->

                </div>
                <div class="p-5 space-y-3"><label>Category</label>
                    <select name="category" class="selectpicker with-border">
                        <option value="Event" @if($post->category == 'Event') selected @endif>Event</option>
                        <option value="Music" @if($post->category == 'Music') selected @endif>Music</option>
                        <option value="Podcast" @if($post->category == 'Podcast') selected @endif>Podcast</option>
                        <option value="Sermon" @if($post->category == 'Sermon') selected @endif>Sermon</option>
                        <option value="Job" @if($post->category == 'Job') selected @endif>Job</option>
                        <option value="Audio Prayer" @if($post->category == 'Audio Prayer') selected @endif>Audio Prayer</option>
                        <option value="Others" @if($post->category == 'Others') selected @endif>Others</option>
                    </select>
                </div>

                <div class="border-t flex justify-between lg:space-x-10 p-7 bg-green-50 rounded-b-md">
                    <button class="button green" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection