<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function indexAction()
    {
        $pageData = Page::where('slug', 'home')->first();

        $pages = Page::all();

        return view('frontend.home');
    }

    public function logoutAction()
    {
        Auth::logout();
        return redirect()->route('frontend.main.page');
    }

}
