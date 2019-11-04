<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index',compact('user'));
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
        // auth()->***にすることによってその指定のユーザーでないとアクセスまた編集ができない
        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }

}
