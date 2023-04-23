@extends('layouts.connect')
@section('title', 'Professional jobs')
@section('description', 'Empowering through professional skills and growing your networks with influencers and by mentors')
@section('keywords', 'skills, empowerment, ngo, professions, expert, empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/post')
@section('content')

<div class="main_content">
            <div class="mcontainer">
                <div class="lg:flex lg:space-x-12">
                    <div class="lg:w-3/4">
                    
                        <div class=" md:mb-4 mb-3">
                            <h2 class="text-2xl font-semibold"> Jobs </h2>
                            
                        </div>

                        <div class="card divide-y divide-gray-100 sm:m-0 -mx-4">
                            @forelse($contents as $content)
                            <div class="flex items-start flex-wrap p-7 sm:space-x-6">
                                <a href="{{ route('post.show', $content) }}" class="w-14 h-14 relative mt-1 order-1">
                                    <img src="{{ asset('storage/' . $content->images->first()->path) }}" alt="{{ $content->title }}" title="{{ $content->title }}" class="rounded-md">
                                </a>
                                <div class="flex-1 sm:order-2">
                                    <h4 class="text-base text-gray-500 font-medium mb-2">{{ $content->user->name }} posted {{ $content->created_at->diffForHumans() }}</h4>
                                    <a href="{{ route('post.show', $content) }}">
                                        <h3 class="text-xl font-medium mb-4"> {{ $content->title }} </h3>
                                    </a>
                                    <p> {!! $content->content !!}
                                    </p> 
                                </div>
                            </div>
                            @empty
                            @endforelse

                        </div>
                     
                    
                    </div>
                    <div class="lg:w-1/4 w-full flex-shrink-0">

                        <!-- <div uk-sticky="media @m ; offset:80 ; bottom : true" class="lg:mt-0 mt-6">
  
                            <h2 class="text-xl font-semibold mb-2"> Recently Posted </h2>
                            <ul class="-space-y-2">
                                <li>
                                    <a href="#" class="hover:bg-gray-100 rounded-md p-3 -mx-3 block">
                                        <h3 class="font-medium line-clamp-2">Technical Event Support and Producer Specialist</h3>
                                        <div class="flex font-medium items-center mt-1 space-x-1.5 text-xs">
                                            <div class="">Full-time</div>
                                            <div class="pb-1"> . </div>
                                            <div class="text-blue-500">100 - 200 / day</div>
                                        </div>
                                    </a>
                                </li>
                               
                            </ul>
                          <br>
                           
                          <h4 class="text-lg font-semibold mb-3"> Tags </h4>

                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Computers</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Business</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> News</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Architecher</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Technolgy</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Music</a> 
                        </div> 
                  
                        </div>-->
                        <div class="uk-sticky-placeholder" style="height: 556px; margin: 0px;"></div>
                    </div>

                </div>
 
            </div>
        </div>
@endsection