<?php


namespace App\Http\Controllers;

use App\Models\saved_text;
use App\Models\Test;
use App\Models\type_result;
use Illuminate\Http\Request;
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
        $bShouldStartTimer = Session::get('bShouldStartTimer');

        Session::remove('bibleApiResponse');
        Session::remove('bShouldStartTimer');

        $type_results = type_result::all();
        $saved_texts = saved_text::all();

        return view('type', compact('type_results', 'saved_texts', 'bibleApiResponse', 'textToCompare', 'bShouldStartTimer'));
    }

    public function storeResult(Request $request)
    {
        $data = request()->validate([
            "timer" => 'string',
            "outputSpeed" => 'string'
        ]);

        type_result::create([
            'result' => $data['outputSpeed'],
            'username' => 'amorous'
        ]);

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
                'text_name' => 'also_default_text_name'
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

    public function testTailwind()
    {
        return view('testTailwind');
    }
}

