@extends('layouts.frontend')

@section('content')
    <h1 class="fw-bold display-4 text-center mb-4 lh-1">
        <span class="color-emerald d-block"> Prevent spam.</span>Stay reachable.
    </h1>

    <p class="text-center fs-5 color-opaque-gray mb-5">hi.dev let's you secure your email address by adding
        a layer through which people can easily communicate with you to prevent annoying spam emails.</p>

    <div class="form-area border border-1 p-4 mb-3 bg-white">
        <x-form action="{{ route('login.post') }}">
            @csrf
            @method('POST')
            <div class="mb-3">
                <x-form-input label="Email address" id="emailAddress" type="email" name="email" required="true"/>
                @if (session('success'))
                    <div class="form-text text-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->has('email'))
                    <div class="form-text text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <x-full-width-button value="Sign in"/>
            <p class="text-center color-opaque-gray">Don't have an account? <a href="{{ route('index') }}"
                                                                               class="text-decoration-none color-emerald fw-medium">Register</a>
            </p>
        </x-form>
    </div>

    <div class="terms-and-privacy d-block text-center">
        <p class="small">By continuing, you agree to our <a href="#" class="text-black fw-medium">Terms</a> and <a
                href="#" class="text-black fw-medium">Privacy</a>.</p>
    </div>
@endsection
