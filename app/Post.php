<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    public function category()
    {
        return $this->hasMany(PostCategoryRelation::class,'post_id', 'id' );
    }

    public function author()
    {
        return $this->belongsTo(User::class,'uid');
    }

    public function collectPost()
    {
        return $this->hasMany(CollectPost::class, 'post_id');
    }

    public function likePost()
    {
        return $this->hasMany(LikePost::class, 'post_id');
    }
}
