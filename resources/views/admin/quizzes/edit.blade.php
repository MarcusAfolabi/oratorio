@extends('layouts.connect')
@section('title', 'Edit Quiz')
@section('description', 'Empowering through professional skills and growing your networks with influencers and by mentors')
@section('keywords', 'skills, empowerment, ngo, professions, expert, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/quiz-list')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('quizzes.index') }}">All Quiz</a>
                    </li>
                    <li class="active">
                        <a href="#">Add New Quiz </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
            <x-validation-errors class="mb-4" />
            <div class="text-center border-b border-green-100 py-6">
                <h3 class="font-bold text-xl"> Editing - {{ $quiz->title }} </h3>
            </div>
            <form method="POST" action="{{ route('quizzes.update', $quiz) }}" >
            @csrf
            @method('PUT')
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="title" name="title" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $quiz->title }}" autocomplete="off">
                    <span for="title" class="line__placeholder"> Question </span>
                </div> 
                <div class="line">
                    <input class="line__input" id="optionA" name="optionA" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $quiz->optionA }}" autocomplete="off">
                    <span for="optionA" class="line__placeholder"> Option A </span>
                </div> 

                <div class="line">
                    <input class="line__input" id="optionB" name="optionB" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $quiz->optionB }}" autocomplete="off">
                    <span for="optionB" class="line__placeholder"> Option B </span>
                </div> 
                <div class="line">
                    <input class="line__input" id="optionC" name="optionC" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $quiz->optionC }}" autocomplete="off">
                    <span for="optionC" class="line__placeholder"> Option C </span>
                </div> 
                <div class="line">
                    <input class="line__input" id="correctAnswer" name="correctAnswer" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $quiz->correctAnswer }}" autocomplete="off">
                    <span for="correctAnswer" class="line__placeholder"> Correct Answer </span>
                </div> 
            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-green-50 rounded-b-md">
                <button class="button green" type="submit">Updated</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection