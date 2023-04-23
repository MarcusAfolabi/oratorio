@extends('layouts.connect')
@section('title', 'Edit Profile')
@section('description', 'Update your account\'s profile information and email address.')
@section('keywords', 'empowering, growing, networks, influencers, mentors')
@section('canonical', 'https://oratoriogroup.org/edit')
@section('content')
<div class="h-full">
  <main class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
      <aside class="sm:px-0 lg:py-0 lg:px-0 lg:col-span-3">
      </aside>
      <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
        <br>
        <x-validation-errors class="mb-1" />

        <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="sm:col-span-6">
            <label for="photo" class="block text-sm font-medium text-green-green-900"> </label>
            <div class="mb-3 mt-1 flex items-center">
              <img class="inline-block h-24 w-24 rounded-full" src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->name }}" title="{{ $user->name }}">
              <div class="ml-4 flex">
                <div class="relative bg-white py-2 px-3 border border-green-green-300 rounded-md shadow-sm flex items-center cursor-pointer hover:bg-green-green-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-green-green-50 focus-within:ring-green-500">
                  <label for="user-photo" class="relative text-sm font-medium text-green-green-900 pointer-events-none">
                    Change photo
                    <span class="sr-only"> user photo
                  </label>
                  <input id="profile_photo_url" name="profile_photo_url" accept="image/*" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-green-300 rounded-md">
                </div>
              </div>
            </div>
          </div>
          <section aria-labelledby="payment-details-heading">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
              <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                  <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Basic details</h2>
                  <p class="mt-1 text-sm text-green-500">Update your account's profile information and other relevant information.</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                  <div class="col-span-4 sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium text-green-700">First name</label>
                    <input type="text" name="name" id="first-name" value="{{ $user->name }}" autocomplete="cc-given-name" class="mt-1 block w-full border border-green-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-green-900 focus:border-green-900 sm:text-sm">
                  </div>

                  <div class="col-span-4 sm:col-span-2">
                    <label for="middle-name" class="block text-sm font-medium text-green-700">Middle name</label>
                    <input type="text" name="middle_name" value="{{ $user->middle_name }}" id="middle_name" autocomplete="cc-middle-name" class="mt-1 block w-full border border-green-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-green-900 focus:border-green-900 sm:text-sm">
                  </div>

                  <div class="col-span-4 sm:col-span-2">
                    <label for="last-name" class="block text-sm font-medium text-green-700">Last name</label>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" id="last_name" autocomplete="cc-last-name" class="mt-1 block w-full border border-green-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-green-900 focus:border-green-900 sm:text-sm">
                  </div>

                  <div class="col-span-4 sm:col-span-2">
                    <label for="email-address" class="block text-sm font-medium text-green-700">Email address</label>
                    <input type="email" name="email" readonly value="{{ $user->email }}" id="email" autocomplete="email" class="mt-1 block w-full border border-green-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-green-900 focus:border-green-900 sm:text-sm">
                  </div>

                  <div class="col-span-4 sm:col-span-1">
                    <label for="phone" class="block text-sm font-medium text-green-700">Phone number</label>
                    <input type="tel" name="phone" value="{{ $user->phone }}" id="phone" autocomplete="tel" class="mt-1 block w-full border border-green-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-green-900 focus:border-green-900 sm:text-sm">
                  </div>

                  <div class="col-span-4 sm:col-span-1">
                    <label for="fellowship_status" class="block text-sm font-medium text-green-700"> Gender
                    </label>
                    <select class="selectpicker with-border" name="gender" required>
                      <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                      <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                    </select>
                  </div>

                  <div class="col-span-4 sm:col-span-1">
                    <label for="industry_id" class="block text-sm font-medium text-green-700">Industry</label>
                    <select name="industry_id" class="selectpicker with-border">
                      @foreach($industries as $industry)
                      <option value="{{ $industry->id }}" @if($industry->id == $industry->name) selected @endif>{{ $industry->name }}</option>
                      @endforeach
                  </div>

                  <div class="col-span-4 sm:col-span-1">
                    <label for="community_id" class="text-sm font-medium text-green-700">
                      Campus
                    </label>
                    <select name="community_id" class="selectpicker with-border">
                      @foreach($communities as $community)
                      <option value="{{ $community->id }}" @if($community->id == $community->name) selected @endif>{{ $community->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-span-4 sm:col-span-1">
                    <label for="work_experience" class="block text-sm font-medium text-green-700">Working Experience</label>
                    <input type="number" name="work_experience" value="{{ $user->work_experience }}" id="work_experience" autocomplete="number" class="mt-1 block w-full border border-green-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-green-900 focus:border-green-900 sm:text-sm">
                  </div>

                  <div class="col-span-4 sm:col-span-4">
                    <label for="work_experience" class="block text-sm font-medium text-green-700">More about you</label>
                    <textarea type="text" rows="4" maxlength="1000" name="biography" class="mt-1 block w-full border border-green-300 rounded-md shadow-sm py-2 px-3 with-border focus:outline-none focus:ring-green-900 focus:border-green-900 sm:text-sm"> {{ $user->biography }} </textarea>
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
                @if (session('status'))
                <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                  {{ session('status') }}
                </p>
                @endif
                <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
              </div>
            </div>
          </section>
        </form>
        @if(!$user->social)
        <form action="{{ route('social.store') }}" method="POST">
          @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
              <div>
                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Social accounts</h2>
                <p class="mt-1 text-sm text-green-500">Link your social presence account profile.</p>
              </div>

              <div class="mt-6 grid grid-cols-4 gap-4">
                <div class="col-span-4 sm:col-span-2">
                  <label for="twitter" class="block text-sm font-medium text-green-700">Twitter</label>
                  <input type="url" name="twitter" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Twitter" />
                </div>

                <div class="col-span-4 sm:col-span-2">
                  <label for="instagram" class="block text-sm font-medium text-green-700">Instagram </label>
                  <input id="instagram" name="instagram" type="url" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Instagram" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="youtube" class="block text-sm font-medium text-green-700">Youtube</label>
                  <input id="youtube" name="youtube" type="url" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Youtube" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="github" class="block text-sm font-medium text-green-700">Github </label>
                  <input id="github" name="github" type="url" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Github" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="website" class="block text-sm font-medium text-green-700">Website </label>
                  <input id="website" name="website" type="url" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="website" />
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
              @if (session('social'))
              <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                {{ session('social') }}
              </p>
              @endif
              <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
            </div>
          </div>
        </form>
        @else
        <form action="{{ route('social.update', $user) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
              <div>
                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Update Social account</h2>
                <p class="mt-1 text-sm text-green-500">Improve your chances by social accounts.</p>
              </div>

              <div class="mt-6 grid grid-cols-4 gap-4">
                <div class="col-span-4 sm:col-span-2">
                  <label for="twitter" class="block text-sm font-medium text-green-700">Twitter</label>
                  <input type="url" value="{{ $user->social->twitter }}" name="twitter" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Twitter" />
                </div>

                <div class="col-span-4 sm:col-span-2">
                  <label for="instagram" class=" block text-sm font-medium text-green-700">Instagram </label>
                  <input id="instagram" value="{{ $user->social->instagram }}" name="instagram" type="url" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Instagram" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="youtube" class="block text-sm font-medium text-green-700">Youtube</label>
                  <input id="youtube" value="{{ $user->social->youtube }}" name="youtube" type="url" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Youtube" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="github" class="block text-sm font-medium text-green-700">Github </label>
                  <input id="github" value="{{ $user->social->github }}" name="github" type="url" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Github" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="website" class="block text-sm font-medium text-green-700">Website </label>
                  <input id="website" value="{{ $user->social->website }}" name="website" type="url" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="website" />
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
              @if (session('social'))
              <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                {{ session('social') }}
              </p>
              @endif
              <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
            </div>
          </div>
        </form>
        @endif
        @if(!$user->skill)
        <form action="{{ route('skill.store') }}" method="POST">
          @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
              <div>
                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Show Skills</h2>
                <p class="mt-1 text-sm text-green-500">Showcase your potential skills to high profile buyers in the diaspora.</p>
              </div>

              <div class="mt-6 grid grid-cols-4 gap-4">
                <div class="col-span-4 sm:col-span-2">
                  <label for="skill" class="block text-sm font-medium text-green-700">Your top skill</label>
                  <input type="text" name="title" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="skill" />
                </div>

                <div class="col-span-4 sm:col-span-2">
                  <label for="level" class="block text-sm font-medium text-green-700">Level </label>
                  <select name="level" class="px-3 py-3 mt-1 block w-full with-border shadow-sm">
                  <option value="Beginner" @if(old('skill') == 'Beginner') selected @endif>Beginner</option>
                  <option value="Junior" @if(old('skill') == 'Junior') selected @endif>Junior</option>
                  <option value="Expert" @if(old('skill') == 'Expert') selected @endif>Expert</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
              @if (session('skill'))
              <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                {{ session('skill') }}
              </p>
              @endif
              <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
            </div>
          </div>
        </form>
        @else
        <form action="{{ route('skill.update', $user) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
              <div>
                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Update Skills</h2>
                <p class="mt-1 text-sm text-green-500">Showcase your potential skills to high profile buyers in the diaspora.</p>
              </div>

              <div class="mt-6 grid grid-cols-4 gap-4">
                <div class="col-span-4 sm:col-span-2">
                  <label for="skill" class="block text-sm font-medium text-green-700">Your top skill</label>
                  <input type="text" value="{{$user->skill->title}}" name="title" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="skill" />
                </div>

                <div class="col-span-4 sm:col-span-2">
                  <label for="level" class="block text-sm font-medium text-green-700">Level </label>
                  <select name="level" class="px-3 py-3 mt-1 block w-full with-border shadow-sm">
                  <option value="Beginner" {{ $user->skill->level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                  <option value="Junior" {{ $user->skill->level == 'Junior' ? 'selected' : '' }}>Junior</option>
                  <option value="Expert" {{ $user->skill->level == 'Expert' ? 'selected' : '' }}>Expert</option> 
 
                  </select>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
              @if (session('social'))
              <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                {{ session('social') }}
              </p>
              @endif
              <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
            </div>
          </div>
        </form>
        @endif
        @if(!$user->experience)
        <form action="{{ route('experience.store') }}" method="POST">
          @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
              <div>
                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Work Experience</h2>
                <p class="mt-1 text-sm text-green-500">Update your job roles and responsibilities, highlighting any notable achievements or accomplishments.</p>
              </div>

              <div class="mt-6 grid grid-cols-4 gap-4">
                <div class="col-span-4 sm:col-span-2">
                  <label for="title" class="block text-sm font-medium text-green-700">Job title</label>
                  <input id="job" type="text" name="title" class="mt-1 block w-full with-border shadow-sm" autocomplete="job" />
                </div>

                <div class="col-span-4 sm:col-span-2">
                  <label for="company_name" class="block text-sm font-medium text-green-700">Company name </label>
                  <input id="company_name" name="company_name" type="text" class="mt-1 block w-full with-border shadow-sm" autocomplete="company name" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="fellowship_status" class="block text-sm font-medium text-green-700"> Employment type
                  </label>
                  <select class="selectpicker with-border" name="employment_type" required="" data-msg="Please select your employment_type.">
                    <option value="Apprenticeship" @if($user->employment_type == 'Apprenticeship') selected @endif>Apprenticeship</option>
                    <option value="Contractor" @if($user->employment_type == 'Contractor') selected @endif>Contractor</option>
                    <option value="Freelancer" @if($user->employment_type == 'Freelancer') selected @endif>Freelancer</option>
                    <option value="Permanent" @if($user->employment_type == 'Permanent') selected @endif>Permanent</option>
                    <option value="Seasonal" @if($user->employment_type == 'Seasonal') selected @endif>Seasonal</option>
                    <option value="Self Employed" @if($user->employment_type == 'Self Employed') selected @endif>Self Employed</option>
                    <option value="Internship" @if($user->employment_type == 'Internship') selected @endif>Internship</option>
                  </select>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="fellowship_status" class="block text-sm font-medium text-green-700"> Is this a Part-Time Job?
                  </label>
                  <select class="selectpicker with-border" name="part_time_work" required="" data-msg="Please select your part_time_work.">
                    <option value="Part time" @if($user->gender == 'Part time') selected @endif>Part time</option>
                    <option value="Full time" @if($user->gender == 'Full time') selected @endif>Full time</option>
                  </select>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="start_date" class="block text-sm font-medium text-green-700">From</label>
                  <input id="start_date" name="start_date" type="date" class="px-3 py-3 with-border" autocomplete="date" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="end_date" class="block text-sm font-medium text-green-700">To </label>
                  <input id="end_date" name="end_date" type="date" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="date" />
                </div>
                <div class="col-span-4 sm:col-span-4">
                  <label for="work_description" class="block text-sm font-medium text-green-700">Work description </label>
                  <textarea id="work_description" name="work_description" type="text" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="website"></textarea>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <div class="bg-white rounded-md max-w-md">
                    <div class="switches-list">
                      <div class="switch-container">
                        <label class="switch">
                          <input type="checkbox" value="0" name="current_work" {{ 1 ? 'checked' : '' }}>
                          <span class="switch-button"></span> Yes, I’m currently working in this company
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
              @if (session('experience'))
              <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                {{ session('experience') }}
              </p>
              @endif
              <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
            </div>
          </div>
        </form>
        @else
        <form action="{{ route('experience.update', $user) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
              <div>
                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Update Work Experience</h2>
                <p class="mt-1 text-sm text-green-500">Update your educational background to gain ground in the community</p>
              </div>

              <div class="mt-6 grid grid-cols-4 gap-4">
                <div class="col-span-4 sm:col-span-2">
                  <label for="title" class="px-3 py-3 block text-sm font-medium text-green-700">Job title</label>
                  <input type="text" name="title" value="{{ $user->experience->title }}" class="mt-1 block w-full with-border shadow-sm" autocomplete="Twitter" />
                </div>

                <div class="col-span-4 sm:col-span-2">
                  <label for="company_name" class="px-3 py-3 block text-sm font-medium text-green-700">Company name </label>
                  <input id="company_name" value="{{ $user->experience->company_name }}" name="company_name" type="text" class="mt-1 block w-full with-border shadow-sm" autocomplete="Instagram" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="fellowship_status" class="block text-sm font-medium text-green-700"> Employment type
                  </label>
                  <select class="selectpicker with-border" name="employment_type" required="" data-msg="Please select your employment_type.">
                    <option value="Apprenticeship" {{ $user->experience->employment_type == 'Apprenticeship' ? 'selected' : '' }}>Apprenticeship</option>
                    <option value="Contractor" {{ $user->experience->employment_type == 'Contractor' ? 'selected' : '' }}>Contractor</option>
                    <option value="Freelancer" {{ $user->experience->employment_type == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                    <option value="Permanent" {{ $user->experience->employment_type == 'Permanent' ? 'selected' : '' }}>Permanent</option>
                    <option value="Seasonal" {{ $user->experience->employment_type == 'Seasonal' ? 'selected' : '' }}>Seasonal</option>
                    <option value="Self Employed" {{ $user->experience->employment_type == 'Self Employed' ? 'selected' : '' }}>Self Employed</option>
                    <option value="Internship" {{ $user->experience->employment_type == 'Internship' ? 'selected' : '' }}>Internship</option>
                  </select>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="fellowship_status" class="block text-sm font-medium text-green-700">Is this a Part-Time Job?
                  </label>
                  <select class="selectpicker with-border" name="part_time_work" required="" data-msg="Please select your part_time_work.">
                    <option value="Part time" {{ $user->experience->part_time_work == 'Part time' ? 'selected' : '' }}>Yes, Part time</option>
                    <option value="Full time" {{ $user->experience->part_time_work == 'Full time' ? 'selected' : '' }}>No</option>
                  </select>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="start_date" class="block text-sm font-medium text-green-700">From</label>
                  <input id="start_date" name="start_date" type="date" value="{{ $user->experience->start_date }}" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Youtube" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="end_date" class="block text-sm font-medium text-green-700">To </label>
                  <input id="end_date" name="end_date" type="date" value="{{ $user->experience->end_date }}" class="px-3 py-3 mt-1 block w-full with-border shadow-sm" autocomplete="Github" />
                </div>
                <div class="col-span-4 sm:col-span-4">
                  <label for="work_description" class="block text-sm font-medium text-green-700">Work description </label>
                  <textarea id="work_description" name="work_description" type="text" class="py-3 px-3 mt-1 block w-full with-border shadow-sm" autocomplete="work_description">{{ $user->experience->work_description }}</textarea>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <div class="bg-white rounded-md max-w-md">
                    <div class="switches-list">
                      <div class="switch-container">
                        <label class="switch">
                          @if($user->experience->current_work == '1')<input value="1" type="checkbox" checked>@else <input value="1" name="current_work" type="checkbox">@endif
                          <span class="switch-button"></span> Yes, I’m currently working in this company</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
              @if (session('experience'))
              <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                {{ session('experience') }}
              </p>
              @endif
              <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
            </div>
          </div>
        </form>
        @endif
        @if(!$user->education)
        <form action="{{ route('education.store') }}" method="POST">
          @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
              <div>
                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Education History</h2>
                <p class="mt-1 text-sm text-green-500">Update your academic achievements including the institutions you attended, the degrees you earned, and any relevant projects</p>
              </div>

              <div class="mt-6 grid grid-cols-4 gap-4">
                <div class="col-span-4 sm:col-span-2">
                  <label for="title" class="block text-sm font-medium text-green-700">School Name</label>
                  <input type="text" name="school_name" class="mt-1 block w-full with-border shadow-sm" autocomplete="Twitter" />
                </div>

                <div class="col-span-4 sm:col-span-2">
                  <label for="company_name" class="block text-sm font-medium text-green-700">Degree Obtained </label>
                  <input id="company_name" name="degree" type="text" class="mt-1 block w-full with-border shadow-sm" autocomplete="Instagram" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="fellowship_status" class="block text-sm font-medium text-green-700"> Field of Study </label>
                  <select class="selectpicker with-border" name="field_id" data-msg="Please select your employment_type.">
                    @foreach($fields as $field)
                    <option value="{{ $field->id }}" @if($field->id == $field->name) selected @endif>{{ $field->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="fellowship_status" class="block text-sm font-medium text-green-700">
                    Is this a Part-Time Job?
                  </label>
                  <select class="selectpicker with-border" name="part_time_work" required="" data-msg="Please select your part_time_work.">
                    <option value="Part time" @if($user->gender == 'Part time') selected @endif>Part time</option>
                    <option value="Full time" @if($user->gender == 'Full time') selected @endif>Full time</option>
                  </select>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="start_date" class="block text-sm font-medium text-green-700">From</label>
                  <input id="start_date" name="start_date" type="date" class="py-3 px-3 mt-1 block w-full with-border shadow-sm" autocomplete="date" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="end_date" class="block text-sm font-medium text-green-700">To </label>
                  <input id="end_date" name="end_date" type="date" class="py-3 px-3 mt-1 block w-full with-border shadow-sm" autocomplete="date" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="city" class="block text-sm font-medium text-green-700">City </label>
                  <input id="city" name="city" type="text" class="mt-1 block w-full with-border shadow-sm" autocomplete="city" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="country" class="block text-sm font-medium text-green-700">Country </label>
                  <input id="country" name="country" type="text" class="mt-1 block w-full with-border shadow-sm" autocomplete="country" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <div class="bg-white rounded-md max-w-md">
                    <div class="switches-list">
                      <div class="switch-container">
                        <label class="switch">
                          <input type="checkbox" value="0" name="status" {{ 1 ? 'checked' : '' }}>
                          <span class="switch-button"></span> Yes, I’m currently running this school
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
              @if (session('education'))
              <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                {{ session('education') }}
              </p>
              @endif
              <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
            </div>
          </div>
        </form>
        @else
        <form action="{{ route('education.update', $user) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
              <div>
                <h2 id="payment-details-heading" class="text-lg leading-6 font-medium text-green-900">Update password</h2>
                <p class="mt-1 text-sm text-green-500">Update your academic achievements including the institutions you attended, the degrees you earned, and any relevant projects.</p>
              </div>

              <div class="mt-6 grid grid-cols-4 gap-4">
                <div class="col-span-4 sm:col-span-2">
                  <label for="school_name" class="block text-sm font-medium text-green-700">School Name</label>
                  <input type="text" name="school_name" value="{{ $user->education->school_name }}" class="mt-1 block w-full with-border shadow-sm" autocomplete="Twitter" />
                </div>

                <div class="col-span-4 sm:col-span-2">
                  <label for="degree" class="block text-sm font-medium text-green-700">Degree Obtained </label>
                  <input id="degree" name="degree" value="{{ $user->education->degree }}" type="text" class="mt-1 block w-full with-border shadow-sm" autocomplete="Instagram" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="fellowship_status" class="block text-sm font-medium text-green-700">
                    Employment type
                  </label>
                  <select class="selectpicker with-border" name="field_id" required="" data-msg="Please select your employment_type.">
                    @foreach($fields as $field)
                    <option value="{{ $field->id }}" @if($field->id == $field->name) selected @endif>{{ $field->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="fellowship_status" class="block text-sm font-medium text-green-700">
                    Is this a Part-Time Job?
                  </label>
                  <select class="selectpicker with-border" name="part_time_work" required="" data-msg="Please select your part_time_work.">
                    <option value="Part time" @if($user->gender == 'Part time') selected @endif>Part time</option>
                    <option value="Full time" @if($user->gender == 'Full time') selected @endif>Full time</option>
                  </select>
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="start_date" class="block text-sm font-medium text-green-700">From</label>
                  <input id="start_date" value="{{ $user->education->start_date }}" name="start_date" type="date" class="mt-1 block w-full with-border shadow-sm" autocomplete="Youtube" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="end_date" class="block text-sm font-medium text-green-700">To </label>
                  <input id="end_date" value="{{ $user->education->end_date }}" name="end_date" type="date" class="mt-1 block w-full with-border shadow-sm" autocomplete="Github" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="city" class="block text-sm font-medium text-green-700">City </label>
                  <input id="city" name="city" type="text" value="{{ $user->education->city }}" class="mt-1 block w-full with-border shadow-sm" autocomplete="city" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <label for="country" class="block text-sm font-medium text-green-700">Country </label>
                  <input id="country" name="country" value="{{ $user->education->country }}" type="text" class="mt-1 block w-full with-border shadow-sm" autocomplete="country" />
                </div>
                <div class="col-span-4 sm:col-span-2">
                  <div class="bg-white rounded-md max-w-md">
                    <div class="switches-list">
                      <div class="switch-container">
                        <label class="switch">
                          @if($user->education->status == '1')<input value="1" type="checkbox" checked>@else <input value="1" name="status" type="checkbox">@endif
                          <span class="switch-button"></span> Yes, I’m currently running this school</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-green-50 text-right sm:px-6">
              @if (session('education'))
              <p class="bg-red-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                {{ session('education') }}
              </p>
              @endif
              <button type="submit" class="bg-green-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-900">Update</button>
            </div>
          </div>
        </form>
        @endif
        <br>
      </div>
    </div>
  </main>
</div>
@endsection