

@extends('layouts.member')
@section('title', 'Login to Oratorio Music Foundation')
@section('main')


@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="#"><img src="{{ asset('new_logo_oratorio_group.png') }}" alt="oratorio logo"></a>
                        <h5 class="font-weight-bold mt-3">Welcome Back</h5>
                        <p class="text-muted">Create your login detail and keep it safe.</p>
                    </div>
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group">
                            <label class="mb-1">Email</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <x-input id="email" class="form-control" type="email" readonly name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Password</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <x-input id="password" name="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Confirm Password</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <x-input id="password" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>

                        <button class="btn btn-danger btn-block text-uppercase" type="submit"> Proceed </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection