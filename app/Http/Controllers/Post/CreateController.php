<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class CreateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function __invoke()
    {
        $posts = Post::all();

        return view('createpost' , compact('posts'));

    }
}
