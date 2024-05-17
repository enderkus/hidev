<?php

namespace App;

use App\Models\ProfileUrl;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function Flasher\Prime\flash as flashAlias;

class UserService
{

    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }


    public function create($data)
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make(Str::password());
            $user->save();

            $profileUrl = new UserProfile();
            $profileUrl->name = Str::slug($data['user_name'], '-');
            $profileUrl->user_id = $user->id;
            $profileUrl->save();

            $profileUrls = new ProfileUrl();
            $profileUrls->profile_id = $profileUrl->id;
            $profileUrls->save();

            DB::commit();
            return ['success' => true, 'user' => $user];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
