<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image; 

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) :false;

        dd($follows);
        return view('profiles.index', compact('user', $follows));
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

        if (request('image')) {
            $imagePath = (request('image')->store('profile', 'public'));

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            
            $imageArray = ['image' => $imagePath];
        }
        // dd(array_merge(
        //     $data,
        //     ['image' => $imagePath] //上の情報を処理をした上で追加でする場合の処理
        // ));

        // auth()->***にすることによってその指定のユーザーでないとアクセスまた編集ができない
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray = []
             //上の情報を処理をした上で追加でする場合の処理
        ));

        return redirect("/profile/{$user->id}");
    }
}
