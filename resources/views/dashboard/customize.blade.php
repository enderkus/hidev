@extends('layouts.dashboard')


@section("content")
    <div class="mb-4">
        <h2 class="fw-bold h6">Your page</h2>
        <p class="color-opaque-gray">This will help you customize the content of your personal page.</p>
    </div>


    <div class="form-area border border-1 rounded-3 p-4 mb-4 bg-white">
        <form action="" method="post">
            <div class="mb-3">
                <label for="valueProp" class="form-label fw-medium">Value prop <small
                        class="small color-opaque-gray">not less than 10 or more than 35 characters</small></label>
                <textarea id="valueProp" placeholder="I'm excited to connect with you." minlength="10"
                          maxlength="35" class="form-control valueprop">{{ $page_content }}</textarea>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" name="remove_userlink" type="checkbox" value=""
                           id="removeUserLink" @if($link_is_visible) checked @endif>
                    <label class="form-check-label small fw-medium" for="removeUserLink">
                        Remove user link <span class="color-opaque-gray fw-light">from contact page.</span>
                    </label>
                </div>
            </div>

            <input type="submit" value="Save" class="btn btn-emerald fw-medium float-end align-self-end">

            <div class="clearfix"></div>

        </form>
    </div>

    <div class="mb-4">
        <h2 class="fw-bold h6">Social links</h2>
        <p class="color-opaque-gray">Add your social profiles to your page.</p>
    </div>

    <div class="form-area border border-1 rounded-3 p-4 mb-4 bg-white">
        <form action="" method="post">

            <div class="mb-3">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="personalWebsite"><i class="bi bi-globe"></i></span>
                    <input type="text" class="form-control placeholder-hi" name="personal_website"
                           placeholder="Personal website" aria-label="personalWebsite" value="{{$profile_urls->personal_webpage}}">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="linkedinProfile"><i class="bi bi-linkedin"></i></span>
                    <input type="text" class="form-control placeholder-hi" name="linkedin_profile"
                           placeholder="Linkedin profile" aria-label="linkedinProfile" value="{{$profile_urls->linkedin_profile}}">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="xProfile"><i class="bi bi-twitter-x"></i></span>
                    <input type="text" class="form-control placeholder-hi" name="x_profile" placeholder="X profile"
                           aria-label="xProfile" value="{{$profile_urls->x_profile}}">
                </div>
            </div>

            <input type="submit" value="Save" class="btn btn-emerald fw-medium float-end align-self-end">

            <div class="clearfix"></div>

        </form>
    </div>
@endsection
