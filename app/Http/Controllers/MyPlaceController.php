<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPlaceController extends Controller
{
    public function index(): string
    {
       return 'this is not my pagController.php';
    }

    public function index2()
    {
        return 'this is my page';
    }

    public function index3()
    {
        return view('test');
    }
}
