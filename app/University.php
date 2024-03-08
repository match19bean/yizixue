<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'university';

    protected $fillable = ['slug', 'name', 'image_path'];

    public function users()
    {
        return $this->hasMany(User::class, 'university', 'id');
    }
}
