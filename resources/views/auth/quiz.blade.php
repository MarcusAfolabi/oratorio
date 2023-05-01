@extends('layouts.connect')
@section('title', 'Quiz to Oratorio Music Foundation')
@section('description', 'Dont miss your next opportunity, do well to pass the quiz')
@section('keywords', 'quiz, exam, test, performance, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/register/quiz')
@section('content')

<style>
    body {
        background-color: #f0f2f5;
    }
</style>

<div class="main_content">
    <div class="bg-gradient-to-tr flex from-green-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-green-100 via-green-400 w-full">
        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3">Membership Quiz</div>
            <div class="text-white text-lg font-medium text-opacity-90">Your scores determine the next phase </div>
        </div>
    </div>
    <div class="mcontainer">
        <div class="-mt-16 bg-white max-w-2xl mx-auto p-10 relative rounded-md shadow">
            <form method="POST" id="register" action="{{ route('register')}}">
                <x-validation-errors class="mb-4" />
                <div class="grid md:gap-y-7 md:gap-x-6 gap-6">
                    @csrf
                    <!-- <h2 class="text-xl font-semibold mb-7" id="Radio"> Radio Button </h2> -->

                    <div class="text-lg font-semibold mb-1"> What is the purpose of Oyindamola Adejumo-Ayibiowu World Outreach? </div>
                    <div class="line"><input class="line__input" id="name" autofocus name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name')}}" autocomplete="off"><span for="name" class="line__placeholder"> </span></div>
 
                    <div class="text-lg font-semibold mb-1"> What are the two arms of Oyindamola Adejumo-Ayibiowu World Outreach, and what are their focus areas?</div>
                    <div class="line"><input class="line__input" id="name" autofocus name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name')}}" autocomplete="off"><span for="name" class="line__placeholder"> </span></div>
                </div>  
                <div class="center">
                    <button type="submit" class="bg-green-500 hover:bg-green-500 hover:text-white font-semibold py-3 px-5 rounded-md text-center text-white mx-auto">
                        Submit Quiz
                    </button>
                </div>
        </div>
        <form>
    </div>
</div>
</div>
@endsection