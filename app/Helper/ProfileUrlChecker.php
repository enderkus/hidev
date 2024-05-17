<?php

namespace App\Helper;

use App\Models\ProfileUrl;

class ProfileUrlChecker
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function check(ProfileUrl $profile) : array
    {
        $profileUrls = [];
        if (isset($profile->personal_webpage) && self::isValidUrl($profile->personal_webpage)) {
            $profileUrls['personal_webpage'] = $profile->personal_webpage;
        }
        if (isset($profile->x_profile) && self::isValidUrl($profile->x_profile)) {
            $profileUrls['x_profile'] = $profile->x_profile;
        }
        if (isset($profile->linkedin_profile) && self::isValidUrl($profile->linkedin_profile)) {
            $profileUrls['linkedin_profile'] = $profile->linkedin_profile;
        }

        $isNotEmpty = count($profileUrls) > 0;

        return [
            'isNotEmpty' => $isNotEmpty,
            'profileUrls' => $profileUrls
        ];
    }

    protected static function isValidUrl($url) : bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
