<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeUser extends Model
{
    protected $fillable = ['uid', 'user_id'];
}
