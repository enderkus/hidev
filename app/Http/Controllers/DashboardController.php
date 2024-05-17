<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $page_url = Auth::user()->profile->name;
        return view('dashboard.index')->with(['page_url' => $page_url, 'user' => Auth::user()]);
    }

    public function customize()
    {
        $page_content = Auth::user()->profile->content;
        $link_is_visible = Auth::user()->profile->profile_url_is_visible;
        $profile_urls = Auth::user()->profile->profileUrls;

        return view('dashboard.customize')->with(['page_content' => $page_content, 'link_is_visible' => $link_is_visible, 'profile_urls' => $profile_urls]);
    }

    public function settings()
    {

        return view('dashboard.settings')->with(['user' => Auth::user()]);
    }
}
