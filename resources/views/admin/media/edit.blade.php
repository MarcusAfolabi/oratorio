@extends('layouts.connect')
@section('title', 'Edit Media type')
@section('description', 'Supervising, editing, video, Empowering through professional skills and growing your networks with influencers and by mentors')
@section('keywords', 'mobile, devOps, Frontend Engineer, skills, empowerment, ngo, professions, expert, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/field')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('media.index') }}">All Media</a>
                    </li>
                    <li class="active">
                        <a href="#">Add New Media </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
            <x-validation-errors class="mb-4" />
            <div class="text-center border-b border-green-100 py-6">
                <h3 class="font-bold text-xl"> Edit - {{ $media->type }} </h3>
            </div>
            <form method="POST" action="{{ route('media.update', $media) }}" >
                @csrf
                @method('PUT')
                <div class="p-10 space-y-7">
                    <div class="line">
                        <input class="line__input" id="type" name="type" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $media->type }}" autocomplete="off">
                        <span for="type" class="line__placeholder"> type </span>
                    </div>
                </div>
                <div class="border-t flex justify-between lg:space-x-10 p-7 bg-green-50 rounded-b-md">
                    <button class="button green" type="submit">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection