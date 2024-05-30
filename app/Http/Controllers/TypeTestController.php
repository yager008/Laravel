<?php

namespace App\Http\Controllers;

use App\Models\saved_text;
use App\Models\Test;
use App\Models\type_result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        Session::start();

        $textToCompare = Session::get('textToCompare');
        $bibleApiResponse = Session::get('bibleApiResponse');
        $loremApiResponse = Session::get('loremApiResponse');
        $apiResponse = '';

        if(isset($bibleApiResponse)) {
            $apiResponse = $bibleApiResponse;
        }
        else {
            $apiResponse = $loremApiResponse;
        }



        $bShouldStartTimer = Session::get('bShouldStartTimer');

        Session::remove('bibleApiResponse');
        Session::remove('loremApiResponse');
        Session::remove('bShouldStartTimer');


       // $type_results = type_result::pluck('result')->toArray();
        $type_results = type_result::where('user_id', auth::user()['id'])
            ->get(['updated_at', 'result', 'number_of_mistakes']);

        // Transform the results into an associative array
        $resultsArray = $type_results->map(function ($item) {
            return [
                'updated_at' => date('H:i d.m.Y', $item->updated_at->timestamp),
                'result' => $item->result,
                'number_of_mistakes' => $item->number_of_mistakes
            ];
        })->toArray();

//        $saved_texts = saved_text::all();
        $saved_texts = saved_text::where('user_id', auth::user()['id'])
            ->get(['id', 'text', 'text_name']);

        $name = auth()->user();

        return view('type', compact('resultsArray', 'saved_texts', 'apiResponse', 'textToCompare', 'bShouldStartTimer', 'name'));
    }

    public function storeResult(Request $request)
    {
        $data = request()->validate([
            "timer" => 'string',
            "numberOfMistakes" => 'string',
            "outputSpeed" => 'string'
        ]);

        type_result::create([
            'result' => $data['outputSpeed'],
            'username' => auth()->user()['name'],
            'user_id' => auth()->user()['id'],
            'number_of_mistakes' => $data['numberOfMistakes']
        ]);

        return redirect()->route("TypeTestControllerPost.type");
    }

    public function deleteSavedText(Request $request)
    {
        $buttonValue = $request->request->get('saved_text_delete_btn');

        saved_text::destroy($buttonValue);

        return redirect()->route("TypeTestControllerPost.type");
    }

    public static function storeSavedTextIfCheckboxIsOn(Request $request)
    {
        Session::start();

        $data = request()->validate([
            "inputTextBox" => 'string',
            'checkbox' => 'required_with:checkbox',
        ]);

        if (isset($data['checkbox']))
        {
            saved_text::create([
                'text' => $data['inputTextBox'],
                'text_name' => 'also_default_text_name',
                'user_id' => auth()->user()['id']
            ]);
        }

        Session::put('textToCompare', $data['inputTextBox']);
        Session::put('bShouldStartTimer', true);


        return redirect()->route("TypeTestController.type");
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
            $stringResponse = $response['verses']['0']['text'];
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

    public function lorem()
    {
        $ch_req = curl_init("https://api.api-ninjas.com/v1/loremipsum?paragraphs=2");
        curl_setopt($ch_req, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch_req, CURLOPT_HTTPHEADER, [
            'X-Api-Key: gVnLRxodHjnwJFa+AHSf0A==Q6ghu5Rq6TwJDkIq'
        ]);

        $response = curl_exec($ch_req);
        $response = json_decode($response, true);

        $err = curl_error($ch_req);
        curl_close($ch_req);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $stringResponse = $response['text'];
            $stringResponse = str_replace("’", "'", $stringResponse);
            $stringResponse = str_replace("‘", "'", $stringResponse);
            $stringResponse = str_replace("“", '"', $stringResponse);
            $stringResponse = str_replace("”", '"', $stringResponse);
            $stringResponse = str_replace(".", '. ', $stringResponse);
            $stringResponse = str_replace(",", ', ', $stringResponse);
            $stringResponse = str_replace(";", '; ', $stringResponse);
            $stringResponse = str_replace("  ", ' ', $stringResponse);
            echo "<div id='loremResponse' >{$stringResponse}</div>";
        }
    }

    public function testTailwind()
    {
        return view('testTailwind');
    }

    public function welcome()
    {
        return view('welcome');
    }
}

