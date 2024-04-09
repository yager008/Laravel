<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SavedText;
use App\Models\typeresult;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Http;

class BibleApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $response = Http::get('https://bible-api.com/?random=verse');
        $response = json_decode($response, true);
        $stringResponse =  $response['verses']['0']['text'];
        $stringResponse = str_replace("’", "'", $stringResponse);
        $stringResponse = str_replace("‘", "'", $stringResponse);
        $stringResponse = str_replace("“", '"', $stringResponse);
        $stringResponse = str_replace("”", '"', $stringResponse);
        $stringResponse = str_replace(".", '. ', $stringResponse);
        $stringResponse = str_replace(",", ', ', $stringResponse);
        $stringResponse = str_replace(";", '; ', $stringResponse);
        $stringResponse = str_replace("  ", ' ', $stringResponse);
        $stringResponse = str_replace("—", '-', $stringResponse);
        $stringResponse = str_replace("?I", '? I', $stringResponse);

        $bibleApiResponse = $stringResponse;
        $typeresults = typeresult::all();
        $saved_texts = SavedText::all();
        return view('type', compact('typeresults', 'saved_texts', 'bibleApiResponse'));

//        echo "<div id='bibleResponse' style='display: none'>{$stringResponse}</div>";
//        //+ js before /body that sets inputTextBox ??
    }
}
