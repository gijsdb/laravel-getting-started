<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {

        //validate
        $this->validate($request, [
            'body' => 'required',
        ]);

        //store the post through an eloquent relationship between user and post. 
       $request->user()->posts()->create($request->only('body'));

       return back();
    }
}
