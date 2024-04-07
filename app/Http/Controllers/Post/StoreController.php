<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\typeresult;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        $data = request()->validate([
            "text_name" => 'string',
            "text" => 'string'
        ]);

        Post::create([
            'text_name' => $data['text_name'],
            'text' => 'text_name'
        ]);

        return redirect()->route("post.index");
    }
}
