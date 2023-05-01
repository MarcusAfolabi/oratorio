@extends('layouts.connect')
@section('title', 'Answer to Quiz list')
@section('description', 'Empowering through professional skills and growing your networks with influencers and by mentors')
@section('keywords', 'skills, empowerment, ngo, professions, expert, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/quiz-list')
@section('content')

<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-field" uk-toggle><i class="icon-material-outline-add"></i> Quiz </a>
                    &nbsp; &nbsp; <a href="#" class="text-green-600 hover:text-green-600"><i class="icon-material-outline-group"></i> Participant Quiz </a>
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
                                            Participant ID</th> 
                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                        Question & Chosen Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($answers)
                                    @forelse ($answers as $answer)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-900"> {{ $answer->participant_id  }} </td>
                                        
                                        <th class="text-sm text-green-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if ($answer->chosenAnswer)
                                            <ul>
                                                @foreach (json_decode($answer->chosenAnswer, true) as $questionId => $answerText)
                                                <li><strong>Q{{ $questionId }}:</strong> {{ $answerText }}</li>
                                                @endforeach
                                            </ul>
                                            @else
                                            <p>No answers submitted yet.</p>
                                            @endif

                                        </th>
                                    </tr>
                                    @empty
                                    <p class="text-center text-opacity-75"> Sorry, nothing to show</p>
                                    @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection