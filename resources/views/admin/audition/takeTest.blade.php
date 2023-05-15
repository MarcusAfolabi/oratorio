@extends('layouts.connect')
@section('title', 'Quiz to Oratorio Music Foundation')
@section('description', 'Dont miss your next opportunity, do well to pass the quiz')
@section('keywords', 'quiz, exam, test, performance, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/register/test')
@section('content')

<style>
    body {
        background-color: #f0f2f5;
    }
</style>

<div class="main_content">
    <div class="bg-gradient-to-tr flex from-green-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-green-100 via-green-400 w-full">
        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3">Audition Test</div>
            <div class="text-white text-lg font-medium text-opacity-90">Your scores determine the next phase (Interview) </div>
        </div>
    </div>
    <div class="mcontainer">
        <div class="-mt-16 bg-white max-w-2xl mx-auto p-10 relative rounded-md shadow">
            <form method="POST" action="{{ route('test.store') }}">
                <x-validation-errors class="mb-4" />
                <div class="grid md:gap-y-7 md:gap-x-6 gap-6">
                    @csrf
                    <input hidden type="email" class="with-border" value="{{ request()->query('email') }}" name="participant" />
                    @forelse($tests as $test)
                    <div class="text-sm font-semibold mb-0">{{ $test->question }}</div>
                    <!-- Use an array as the name attribute for the title field -->
                    <input type="hidden" name="question[]" value="{{ $test->title }}">
                    <div class="radio">
                        <!-- Use an array as the name attribute for the correctAnswer field -->
                        <input id="radio-1-{{ $test->id }}" name="chosenAnswer[{{ $test->id }}]" value="{{ $test->optionA }}" type="radio">
                        <label for="radio-1-{{ $test->id }}"><span class="radio-label"></span> {{ $test->optionA }} </label>
                    </div>
                    <div class="radio">
                        <input id="radio-2-{{ $test->id }}" name="chosenAnswer[{{ $test->id }}]" value="{{ $test->optionB }}" type="radio">
                        <label for="radio-2-{{ $test->id }}"><span class="radio-label"></span> {{ $test->optionB }} </label>
                    </div>
                    <div class="radio">
                        <input id="radio-3-{{ $test->id }}" name="chosenAnswer[{{ $test->id }}]" value="{{ $test->optionC }}" type="radio">
                        <label for="radio-3-{{ $test->id }}"><span class="radio-label"></span> {{ $test->optionC }} </label>
                    </div>
                    @empty
                    Sorry, nothing to show!
                    @endforelse
                </div>
                <div class="center">
                    <button type="submit" class="bg-green-500 hover:bg-green-500 hover:text-white font-semibold py-3 px-5 rounded-md text-center text-white mx-auto">
                        Submit Test
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@endsection