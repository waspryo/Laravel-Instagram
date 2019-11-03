<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    // \App\(Tablename)を入れることでマッチしないページは404が出る
    public function show(\App\Post $post)

    // $sports = array(
    //     'tennis' => $tennis,
    //     'basketball' => $basketball,
    //     'soccer' => $soccer,
    //    );
       //同じ意味になる
       
       // $sports = compact('tennis','basketball','soccer');
    {
        return view('posts.show', compact('post'));
    }
}
