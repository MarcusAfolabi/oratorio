@extends('layouts.connect')
@section('title', 'Reset Password using the Request Link')
@section('description', 'Enter a new password for your account. A simple but secure set of words that contains, capital, small letter, special character, and numbers, minimum of 8 character')
@section('keywords', 'new password, account, reset, password, link, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/reset-password')
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

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="block">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection