@extends('layouts.connect')
@section('title', 'Authorization to Oratorio Music Foundation')
@section('description', 'Dont miss your next opportunity. Sign in to stay updated on your professional world.')
@section('keywords', 'empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/login')
@section('content')

<style>
    body {
        background-color: #f0f2f5;
    }
</style>
<div class="lg:flex max-w-5xl min-h-screen mx-auto p-6 py-10">
    <div class="flex flex-col items-center lg: lg:flex-row lg:space-x-10">

        <div class="lg:mb-12 flex-1 lg:text-left text-center">
            <img src="{{ asset('dark_oratorio_logo.png') }}" alt="oratorio group" class="lg:mx-0 lg:w-52 mx-auto w-40">
        </div>
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-validation-errors class="mb-1" />

        <div class="lg:mt-0 lg:w-96 md:w-1/2 sm:w-2/3 mt-10 w-full">
            <form action="{{ route('participant.email') }}" class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg" method="POST">
                @csrf
                <input type="email" id="email" name="email" placeholder="Enter Email" class="with-border">
                <button type="submit" class="bg-red-600 font-semibold p-3 rounded-md text-center text-white w-full">
                    Send Handbook
                </button>
            </form>
            <div class="mt-8 text-center text-sm"> <a href="#" class="text-green-600 font-semibold hover:text-green-500"> Your email would receive the Oratorio Handbook for better preparation for the quiz</a></div>
        </div>

    </div>
</div>

@endsection