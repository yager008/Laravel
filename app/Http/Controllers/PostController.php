<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        dd($posts);
        foreach ($posts as $post)
        {
            dump($post->name);
        }
    }

    public function index2()
    {
        return 'this is my page';
    }
}
