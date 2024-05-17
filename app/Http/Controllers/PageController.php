<?php

namespace App\Http\Controllers;

use App\Helper\ProfileUrlChecker;
use App\Http\Requests\ProfilePostRequest;
use App\Jobs\SendReceivedEmail;
use App\Models\UserProfile;
use App\Notifications\ReceiveMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('index');
    }

    public function getProfile(Request $request, $profile_name)
    {
        $profile = UserProfile::where('name', $profile_name)->first();
        if (!$profile) {
            abort(404);
        }

        $profileUrls = ProfileUrlChecker::check($profile->profileUrls);

        return view('profile', ['profile' => $profile, 'profileUrls' => $profileUrls]);
    }

    public function postProfile(ProfilePostRequest $request, $profile_name)
    {
        $profile = UserProfile::where('name', $profile_name)->first();
        if (!$profile) {
            abort(404);
        }

        SendReceivedEmail::dispatch($profile->user, $request->sender_email, $request->subject, $request->mail_content);

        flash()->success('Message sent successfully.');
        return redirect()->back();
    }

}
