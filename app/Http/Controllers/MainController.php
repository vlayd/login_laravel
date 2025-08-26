<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        if(!session('user')){
            return view('login/index');
        }

        return view('home.index');
    }

    public function page404()
    {
        return view('layouts.page_404');
    }
}
