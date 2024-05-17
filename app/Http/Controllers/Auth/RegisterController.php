<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendUserVerificationMail;
use App\Models\User;
use App\Models\UserProfile;
use App\UserService;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use function Flasher\Prime\flash as flashAlias;

class RegisterController extends Controller
{

    public function store(RegisterRequest $request)
    {
        $userService = new UserService();
        $user = $userService->create($request);
        if (!$user['success']) {
            flashAlias()->error($user['message']);
            return redirect()->back();
        }
        $user = $user['user'];
        Auth::login($user);
        SendUserVerificationMail::dispatch($user);
        flashAlias()->success('User created successfully. Please confirm your email.');
        return redirect()->route('verification.notice')->with(['user_email' => $user->email]);
    }
}
