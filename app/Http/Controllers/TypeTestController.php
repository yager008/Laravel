<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\typeresult;
use Illuminate\Http\Request;

class TypeTestController extends Controller
{
    public function linux()
    {
        echo "hello from git";
        echo "hello";
    }

    public function git()
    {
        echo "hello from git";
    }
    public function index()
    {
        return view('test');
    }
    public function type()
    {
        return view('type');
    }


    public function storeResult()
    {
        $data = request()->validate([
            "timer" => 'int',
            "name" => 'string'
        ]);

        typeresult::create([
            'timer' => '30'
        ]);

        return redirect()->route("TypeTestControllerPost.type");
    }

    public function upload(Request $request)
    {
        echo $request->inputBox;

        $test = new Test();
        $test->basicString = $request->inputBox;
        $test->save();

    }
    public function create(Request $request)
    {
        $tempstring = $request->inputBox;

        Test::create(
            [
                'basicString' => 'hello shitty coder'
            ]
        );
    }
    public function bible()
    {

            $ch_req = curl_init("https://bible-api.com/?random=verse");
            curl_setopt($ch_req, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch_req);
            $response = json_decode($response, true);

            $err = curl_error($ch_req);
            curl_close($ch_req);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $stringResponse =  $response['verses']['0']['text'];
                $stringResponse = str_replace("’", "'", $stringResponse);
                $stringResponse = str_replace("‘", "'", $stringResponse);
                $stringResponse = str_replace("“", '"', $stringResponse);
                $stringResponse = str_replace("”", '"', $stringResponse);
                $stringResponse = str_replace(".", '. ', $stringResponse);
                $stringResponse = str_replace(",", ', ', $stringResponse);
                $stringResponse = str_replace(";", '; ', $stringResponse);
                $stringResponse = str_replace("  ", ' ', $stringResponse);
                echo "<div id='bibleResponse' >{$stringResponse}</div>";
        }

    }
}

