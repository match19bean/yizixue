<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReference extends Model
{
    //
    protected $fillable = ['user_id', 'image_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
