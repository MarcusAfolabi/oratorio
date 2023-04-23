@extends('layouts.connect')
@section('title', 'Professional Fields')
@section('description', 'Empowering through professional skills and growing your networks with influencers and by mentors')
@section('keywords', 'skills, empowerment, ngo, professions, expert, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/field')
@section('content')
 
<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a uk-tooltip="Add" href="#modal-field" uk-toggle><i class="icon-material-outline-add"></i> Educational Fields  </a>
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
                                            Name</th> 
                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-green-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($fields as $key => $field)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-900">{{
                                            ++$key}}</td>
                                        <th class="text-sm text-green-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $field->name }} 
                                        </th> 
                                        <td class="text-sm text-green-900 font-light px-6 py-4 whitespace-nowrap"> <a href="{{ route('field.edit', $field) }}"> <span class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-green-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('field.destroy', $field) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>
                                            </form>
                                        </td>

                                    </tr>
                                    @empty
                                    <p class="text-center text-opacity-75"> Sorry, nothing to show</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $fields->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-field" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default m-3" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title"><i class="icon-material-outline-add"></i> Add new Field</h2>
        </div>
        <form method="POST" action="{{ route('field.store') }}" >
            @csrf
            <div class="p-10 space-y-7">
                <div class="line">
                    <input class="line__input" id="name" name="name" type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('name') }}" autocomplete="off">
                    <span for="name" class="line__placeholder"> Name </span>
                </div> 
            </div>
            <div class="border-t flex justify-between lg:space-x-10 p-7 bg-green-50 rounded-b-md">
                <button class="button green" type="submit">Add</button>
            </div>

        </form>
    </div>
</div>
@endsection