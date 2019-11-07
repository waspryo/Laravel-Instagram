<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // $guardedは指定したカラムのみ代入可能
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ?  $this->image : 'profile/aHeKUDlXiJm1fiSnRl2fJUrzATPTSraj5RnUexTS.jpeg';
        return '/storage/' .$imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
