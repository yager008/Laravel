<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        return view('page0');
    }

    public function page1 ()
    {
        return view('page1');
    }

    public function page2 ()
    {
        return view('page2');
    }
}
