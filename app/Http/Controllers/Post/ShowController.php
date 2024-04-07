<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\typeresult;

class ShowController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
//    public function __invoke($id)
//    {
//        $post = Post::findOrFail($id);
//        dd($post);
//    }

    public function __invoke(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
