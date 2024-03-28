<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectPost extends Model
{
    protected $fillable = ['uid', 'post_id'];

    protected $table = 'collect_post';
}
