<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post){
        $post->likes()->create([
            'user_id' => auth()->user()->id,

        ]);

        return back();
    }

    public function destroy(Post $post){
        auth()->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
