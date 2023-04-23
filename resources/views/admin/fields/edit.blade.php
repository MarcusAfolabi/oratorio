@extends('layouts.connect')
@section('title', 'Professional Fields')
@section('description', 'Empowering through professional skills and growing your networks with influencers and by mentors')
@section('keywords', 'skills, empowerment, ngo, professions, expert, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/field')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div class="breadcrumb-area py-0">
            <div class="breadcrumb">
                <ul class="m-0">
                    <li>
                        <a href="{{ route('field.index') }}">All Field</a>
                    </li>
                    <li class="active">
                        <a href="#">Add New Field </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
            <x-validation-errors class="mb-4" />
            <div class="text-center border-b border-green-100 py-6">
                <h3 class="font-bold text-xl"> Edit - {{ $field->name }} </h3>
            </div>
            <form method="POST" action="{{ route('field.update', $field) }}">
                @csrf
                @method('PUT')
                <div class="p-10 space-y-7">
                    <div class="line">
                        <input class="line__input" id="name" name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ $field->name }}" autocomplete="off">
                        <span for="name" class="line__placeholder"> Name </span>
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