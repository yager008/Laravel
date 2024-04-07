<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class EditController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function __invoke(Post $post)
    {

        return view('post.edit' , compact('post'));

    }
}
