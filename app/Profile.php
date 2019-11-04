<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // $guardedは指定したカラムのみ代入可能
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
