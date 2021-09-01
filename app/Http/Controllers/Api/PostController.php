<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
 public function index()
    {

        $posts = Post::all();
        return $posts;
    }
    public function show($post)
    {
        $post = Post::findOrfail($post);
        return $post;
    }
    public function store(Request $requestObj){

        $requestObj->validate([
                'title' => 'required|min:3',
                 'description' => 'required|min:10'

        ],[
            'title.required' => 'required min 3 words and uniqe',
             'title.min' => 'requre min 3 words and uniqe',
        ]
             );
             $post = Post::create([

                'title' => $requestObj['title'],
                'description' => $requestObj['description'],
                'user_id' => $requestObj['postedBy'],
            ]);

return $post;
    }
}
