<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPostCategoryRelation extends Model
{
    //
    protected $fillable = ['user_id', 'post_category_id'];

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
