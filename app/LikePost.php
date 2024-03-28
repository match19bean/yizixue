<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    protected $fillable = ['uid', 'post_id'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
