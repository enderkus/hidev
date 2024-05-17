@extends('layouts.dashboard')

@section("content")
    <div class="mb-4">
        <h2 class="fw-bold h6">Settings</h2>
        <p class="color-opaque-gray">This is your account personal information.</p>
    </div>

    <div class="form-area border border-1 rounded-3 p-4 mb-4 bg-white">

        <div class="d-flex justify-content-center mb-4">
            <div class="avatar rounded-circle d-flex align-items-center justify-content-center">
                <p class="mb-0 fs-2 text-white fw-lighter">{{ strtoupper(substr($user->name, 0, 1)) }}</p>
            </div>
        </div>

        <form action="" method="post">

            <div class="mb-3">
                <label for="fullName" class="form-label fw-medium">Full name</label>
                <input type="text" name="name" id="fullName" class="form-control" value="{{$user->name}}"
                       required>
            </div>

            <div class="mb-3">
                <label for="emailAddress" class="form-label fw-medium">Email address</label>
                <input type="email" name="email" id="emailAddress" class="form-control color-opaque-gray"
                       value="{{$user->email}}" disabled>
            </div>

            <input type="submit" value="Save" class="btn btn-emerald fw-medium float-end align-self-end">

            <div class="clearfix"></div>

        </form>
    </div>
@endsection
