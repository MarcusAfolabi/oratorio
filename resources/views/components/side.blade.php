@props(['audio'])

<div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-blue-50">
    <a href="#" iv class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
        <img src="{{ asset('head_icon.png') }}" class="absolute w-full h-full inset-0" alt="{{ $audio->title }}">

    </a>

    <div class="flex-1">
        <a href="#" class="text-base font-semibold capitalize leading-6 line-clamp-1 mt-1">
            {{ $audio->title }}
        </a>
        <audio class="js-player">
            <source src="{{ asset('storage/app/public/' . $audio->images->first()->path) }}" />
        </audio>
        <div class="text-sm text-blue-500 mt-0.5"> {{ $audio->views }} Streamed</div>
    </div>
</div>
