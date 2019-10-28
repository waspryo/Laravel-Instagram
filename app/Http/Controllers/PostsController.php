<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        // pathは route/sth
        // または route.sth
        //　で書ける
        return view('posts.create');
    }

    public function store()
    {
        dd(request()->all());
    }
}
