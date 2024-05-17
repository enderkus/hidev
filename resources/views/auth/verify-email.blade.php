@extends('layouts.frontend')

@section('content')
    <h1 class="fw-bold display-4 text-center mb-4 lh-1">
        <span class="color-emerald d-block"> Prevent spam.</span>Stay reachable.
    </h1>

    <p class="text-center fs-5 color-opaque-gray mb-5">hi.dev let's you secure your email address by adding
        a layer through which people can easily communicate with you to prevent annoying spam emails.</p>

    <div class="form-area border border-1 p-4 mb-3 bg-white">
        <p class="small">We've sent a link with security code to <a href="#"
                                                                    class="text-decoration-none text-black fw-bold">{{ session()->get('user_email') ?? $user_email }}</a>.
            Click the link sent to complete
            verification. If you didn't receive the email, please click button below to resend.</p>

        <x-form action="{{ route('verification.send') }}">
            @csrf
            @method('POST')
            <x-full-width-button value="Resend verification email"/>
        </x-form>
    </div>

    <div class="terms-and-privacy d-block text-center">
        <p class="small">By continuing, you agree to our <a href="#" class="text-black fw-medium">Terms</a>
            and <a href="#" class="text-black fw-medium">Privacy</a>.</p>
    </div>
@endsection
