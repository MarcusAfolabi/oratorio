@extends('layouts.member')
@section('title', 'Verify your Email Account')
@section('description', 'Just let us know your email address and we will grant you access to Oratorio community')
@section('main')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="#"><img src="{{ asset('new_logo_oratorio_group.png') }}" alt="oratorio logo"></a>
                        <h5 class="font-weight-bold mt-3">Verify your email</h5>
                        <p class="text-muted">Just let us know your email address and we will grant you access to Oratorio community</p>
                    </div>
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">Email</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-danger btn-block text-uppercase" type="submit"> Verify Email
                        </button>
                        <div class="py-3 d-flex align-item-center">
                                <a href="{{ route('login') }}">Login</a>
                                <span class="ml-auto"> New to Oratorio? <a class="font-weight-bold"
                                        href="mailto:membershiprequest@oratoriogroup.org">Request access</a></span>
                            </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection