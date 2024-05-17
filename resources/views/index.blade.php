@php use Illuminate\Support\Facades\Auth;use function Laravel\Prompts\error; @endphp
@extends('layouts.frontend')


@section('content')
    {{ Auth::user() }}
    <h1 class="fw-bold display-4 text-center mb-4 lh-1">
        <span class="color-emerald d-block"> Prevent spam.</span>Stay reachable.
    </h1>

    <p class="text-center fs-5 color-opaque-gray mb-5">hi.dev let's you secure your email address by adding
        a layer through which people can easily communicate with you to prevent annoying spam emails.</p>

    <div class="p-3 border border-1 rounded-3 small bg-gradient color-opaque-gray mb-4 bg-white">
        Instead of saying “email me at mailto:xxx@yyy.com”. You can just say “email me here:
        https://hi.dev/yyy”
    </div>


    <div class="form-area border border-1 p-4 mb-3 bg-white">
        <x-form action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <x-form-input label="Full name" name="name" id="fullName" required="true"/>
                @if($errors->has('name'))
                    <div class="form-text text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <x-form-input label="Email address" name="email" id="emailAddress" type="email" required="true"/>
                @if($errors->has('email'))
                    <div class="form-text text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <x-group-input label="Choose a username" name="user_name" id="userName" groupText="hi.dev/"
                               required="true" oninput="handleUserNameInput(this)"/>
                @if($errors->has('user_name'))
                    <div class="form-text text-danger">
                        {{ $errors->first('user_name') }}
                    </div>
                @endif
            </div>

            <x-full-width-button value="Continue"/>

            <p class="text-center color-opaque-gray">Already have an account? <a href="{{ route('login') }}"
                                                                                 class="text-decoration-none color-emerald fw-medium">Log
                    in</a></p>
        </x-form>
    </div>

    <div class="try-it border border-1 px-4 py-1 mb-4 bg-white">
        <a href="#"
           class="text-decoration-none text-black fw-medium small d-flex align-items-center justify-content-between">Try
            it out by sending dante a message <i class="bi bi-arrow-right-short fs-4 color-emerald"></i></a>
    </div>

    <div class="terms-and-privacy d-block text-center">
        <p class="small">By continuing, you agree to our <a href="#" class="text-black fw-medium">Terms</a>
            and <a href="#" class="text-black fw-medium">Privacy</a>.</p>
    </div>

    <div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-bs-delay="10000">
        <div role="alert" aria-live="assertive" aria-atomic="true">...</div>
    </div>

@endsection
