<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\typeresult;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            "text_name" => 'string',
            "text" => 'string'
        ]);
        $post->update($data);

        return redirect()->route("post.show", $post->id);
    }
}
