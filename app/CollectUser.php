<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectUser extends Model
{
    protected $table = 'collect_user';

    protected $fillable = ['uid', 'user_id'];
}
