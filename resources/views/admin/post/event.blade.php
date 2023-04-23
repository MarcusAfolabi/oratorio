@extends('layouts.connect')
@section('title', 'Oratorio Events')
@section('description', 'Event that Empower through professional skills and growing your networks with influencers and by mentors')
@section('keywords', 'skills, empowerment, ngo, professions, expert, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/post')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#otherPost" uk-toggle><i class="icon-material-outline-add"></i> Event content </a>
                </h5>
            </div>
        </div>
        <x-validation-errors class="mb-4" />
        @if (session('status'))
        <p class="bg-whit border-t-4 border-red-600 p-5 shadow-lg relative rounded-md" uk-alert>
            {{ session('status') }}
        </p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="search" placeholder="search..." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                            Event</th>

                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                            Views</th>
                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                            Delete</th>
                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                            Content</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($events as $key => $event)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-blue-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if($event->images) @foreach ($event->images as $image)<a href="{{ asset('storage/' . $image->path) }}"> <i class="icon-material-outline-launch"></i>Open </a>@endforeach @endif

                                        </th>
                                        <th class="text-sm text-green-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $event->views }}
                                        </th>
                                        <td class="text-sm text-green-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('post.edit', $event) }}"> <span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-green-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('post.destroy', $event) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>
                                            </form>
                                        </td>
                                        <th class="text-sm text-green-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $event->content }}
                                        </th>
                                    </tr>
                                    @empty
                                    <p class="text-center text-opacity-75"> Sorry, nothing to show</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-otherpost :otherpost />
@endsection