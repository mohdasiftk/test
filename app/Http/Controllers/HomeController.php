<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }
    public function home()
    {
        return view('home');
    }
}
