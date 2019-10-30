<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        // pathは route/sth
        // または route.sth
        //　で書ける
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
             'caption' => 'required',
             'image' => ['required', 'image'],
        ]);

        $imagePath = (request('image')->store('uploads', 'public'));

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        // $post = new \App\Post();

        // $post->caption = $data['caption'];
        // $post->save();

        // \App\Post::create($data);

        return redirect('/profile/' . auth()->user()->id);
    }
}
