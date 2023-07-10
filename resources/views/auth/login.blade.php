@extends('layouts.connect')
@section('title', 'Login to Oratorio Music Foundation')
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
            <form action="{{ route('login') }}" class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Email" class="with-border">
                <input type="password" name="password" placeholder="Password" class="with-border">
                <button type="submit" class="bg-red-600 font-semibold p-3 rounded-md text-center text-white w-full">
                    Log In
                </button>
                <a href="{{ route('password.request') }}" class="text-red-500 text-center block"> Forgot Password? </a>
                <hr class="pb-3.5">
                <div class="flex">
                    <a href="#register" type="button" class="bg-green-600 hover:bg-green-500 hover:text-white font-semibold py-3 px-5 rounded-md text-center text-white mx-auto" uk-toggle>
                        Create New Account
                    </a>
                </div>
            </form>

            <div class="mt-8 text-center text-sm"> <a href="#" class="font-semibold"> Sign in to stay updated on with the professionals.</a></div>
        </div>

    </div>
</div>

<!-- This is the modal -->
<!-- <div id="register" uk-modal>
    <div class="uk-modal-dialog uk-modal-body rounded-xl shadow-2xl p-0 lg:w-5/12">
        <button class="uk-modal-close-default p-3 bg-gray-100 rounded-full m-3" type="button" uk-close></button>
        <div class="border-b px-7 py-5">
            <div class="lg:text-2xl text-xl font-semibold mb-1"> Sign Up</div>
            <div class="text-base text-gray-600"> It’s quick and easy.</div>
        </div>
        <form action="{{ route('register') }}" method="POST" class="p-7 space-y-5">
            @csrf
            <div class="grid lg:grid-cols-2 gap-5">
                <input type="text" id="firstname" name="name" placeholder="Your Name" class="with-border">
                <input type="text" id="lastname" name="last_name" placeholder="Last Name" class="with-border">
            </div>
            <input type="email" id="email" name="email" placeholder="Info@example.com" class="with-border">
            <input type="hidden" value="city" name="city" placeholder="location" class="with-border">
            <input type="hidden" value="state" name="state" placeholder="location" class="with-border">
            <input type="hidden" value="country" name="country" placeholder="location" class="with-border">
            <input type="password" id="password" name="password" placeholder="Password" class="with-border">
            <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm Password" class="with-border">

            <div class="grid lg:grid-cols-2 gap-3">
                <div>
                    <label class="mb-0"> Gender </label>
                    <select name="gender" id="gender" class="px-3 py-3 mt-2 with-border">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label class="mb-2"> Phone </label>
                    <input type="tel" name="phone" id="phone" placeholder="2348123456789" class="px-5 py-3 with-border">
                </div>
            </div>
            <p class="text-xs text-gray-400 pt-3">By clicking Sign Up, you agree to our
                <a href="#" class="text-green-500">Terms</a>,
                <a href="#" class="text-green-500">Data Policy</a> and
                <a href="#" class="text-green-500">Cookies Policy</a>.
                You may receive Email Notifications from us and can opt out any time.
            </p>
            <div class="flex">
                <button type="submit" class="bg-green-600 font-semibold mx-auto px-10 py-3 rounded-md text-center text-white">
                    Get Started
                </button>
            </div>
        </form>

    </div>
</div> -->

@endsection