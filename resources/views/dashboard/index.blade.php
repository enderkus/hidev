@extends('layouts.dashboard')

@section('content')
    <div class="mb-4">
        <h2 class="fw-bold h6">Welcome to hi.dev</h2>
        <p class="color-opaque-gray">Get started by coping and sharing your secure email link or add more
            security in the security section. </p>
    </div>

    <div class="bg-black p-4 rounded-3 text-white mb-4">
        <p class="text-center color-opaque-gray text-uppercase small">Click to copy and share your secure
            email link</p>
        <div class="bg-dark p-2 rounded-3">
            <h1 class="text-center h5 mb-0 color-emerald">hi.dev/{{ $page_url }}</h1>
        </div>
    </div>

    <div class="form-area border border-1 rounded-3 p-4 mb-3 bg-white">
        <form action="" method="post">
            <div class="mb-3">
                <x-form-input label="Email address" name="email" id="emailAddress" required="true" value="{{ $user->email }}" disabled/>
            </div>

            <div class="mb-3">
                <label for="userName" class="form-label fw-medium">Secure email link</label>
                <x-group-input label="Secure email link" name="user_name" id="userName" groupText="hi.dev/"  required="true" value="{{$page_url}}" oninput="handleUserNameInput(this)"/>
            </div>

            <input type="submit" value="Save" class="btn btn-emerald fw-medium float-end align-self-end">

            <div class="clearfix"></div>

        </form>
    </div>
@endsection
