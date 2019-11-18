<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function indexAction()
    {
        $users = User::all();
       var_dump('Hello');

    }

}
