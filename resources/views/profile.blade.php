@extends('layouts.frontend')

@section('content')
    <div class="profile-detail d-flex gap-3 align-items-center justify-content-center mb-4">
        <div class="avatar-small rounded-circle d-flex align-items-center justify-content-center">
            <p class="mb-0 fs-5 text-white fw-lighter">{{ strtoupper(substr($profile->user->name, 0, 1)) }}</p>
        </div>

        <h2 class="mono-space-font">hi.dev<span class="color-emerald">/</span>{{ $profile->name }}</h2>
    </div>

    <h1 class="fw-bold display-4 text-center mb-4 lh-1">
        <span class="color-emerald">I'm excited</span> to connect with you
    </h1>

    <div class="form-area border border-1 p-4 mb-4 bg-white">
        <x-form action="{{ route('profile.post', $profile->name) }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="sender_email" class="form-control placeholder-hi"
                       placeholder="Your email" required>
            </div>

            <div class="mb-3">
                <input type="text" maxlength="50" name="subject" class="form-control placeholder-hi"
                       placeholder="Subject" required>
            </div>

            <div class="mb-3">
                <textarea name="mail_content"  cols="30" rows="7" class="form-control placeholder-hi"
                          placeholder="Write a message..." maxlength="320" required></textarea>
            </div>

            <input type="submit" value="Send" class="btn btn-emerald fw-medium float-end">

            <div class="clearfix"></div>
        </x-form>
    </div>

    @if($profileUrls['isNotEmpty'])
        <div class="social-icons d-flex justify-content-center mb-4">
            <ul class="list-unstyled mb-0 d-flex gap-3">
                @if(isset($profileUrls['profileUrls']['personal_webpage']))
                    <li>
                        <a href="{{$profileUrls['profileUrls']['personal_webpage']}}"
                           class="text-decoration-none color-opaque-gray fs-3"><i class="bi bi-globe"></i></a>
                    </li>
                @endif

                @if(isset($profileUrls['profileUrls']['linkedin_profile']))
                    <li>
                        <a href="{{$profileUrls['profileUrls']['linkedin_profile']}}"
                           class="text-decoration-none color-opaque-gray fs-3"><i
                                class="bi bi-linkedin"></i></a>
                    </li>
                @endif

                @if(isset($profileUrls['profileUrls']['x_profile']))
                    <li>
                        <a href="{{$profileUrls['profileUrls']['x_profile']}}"
                           class="text-decoration-none color-opaque-gray fs-3"><i class="bi bi-twitter-x"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    @endif

    @guest()
        <div class="terms-and-privacy d-block text-center">
            <p class="small color-opaque-gray">Create your own secure digital contact <a href="{{ route('index') }}"
                                                                                         class="text-black fw-medium">now.</a>
            </p>
        </div>
    @endguest
@endsection
