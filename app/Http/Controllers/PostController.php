<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;



class PostController extends Controller
{
    public function index()
    {
        $postCollection = Post::all(); //select * from posts

        return view('posts.index', ['postCollectionView' => $postCollection]);
    }

    public function show($postId)
    {
        $post = Post::findOrFail($postId);

        return view('posts.show',['blog'=>$post] );
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);

     }


     public function store(Request $requestObj)
    {
        //logic to store data in db
        $requestData = request()->all();

        $requestObj->validate([
                'title' => 'required|min:3',
                 'description' => 'required|min:10'

        ],[
            'title.required' => 'required min 3 words and uniqe',
             'title.min' => 'requre min 3 words and uniqe',
        ]
             );
             //dd ($requestData);
        //equals insert into
        $post = Post::create([

            'title' => $requestData['title'],
            'description' => $requestData['description'],
            'user_id' => $requestData['postedBy'],
        ]);

        return redirect()->route('posts.index');
    }


    public function destroy($postid)
    {
        $post= Post::findOrFail ($postid);
       // dd($post);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'post deleted successfully');
    }

    public function edit(Post $post)
    {
        $users = User::all();

        return view('posts.edit', ['users' => $users ,"post" => $post]);
       // return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $users = User::all();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required'

        ]);
        $post->update($request->all());

        return redirect()->route('posts.index' ,['users' => $users]);

    }


}
