<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategoryRelation extends Model
{
    protected $fillable = ['category_id ', 'post_id '];
    protected $table = 'post_category_relation';
}
