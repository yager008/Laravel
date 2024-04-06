<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $ExampleArray = [
            'hello '=> 'amogus',
            'hello1'=> 'world',
            'hello3' => [
                'hello guys' => 'amogsus',
                1 => 'that wierd'
            ]
        ];

        var_dump($ExampleArray);
        echo "hello world from test controller";
    }
}
