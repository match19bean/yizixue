<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'university';

    protected $fillable = ['slug', 'name', 'image_path', 'english_name', 'chinese_name', 'state', 'country', 'area', 'school_badge'];

    public function users()
    {
        return $this->hasMany(User::class, 'university', 'id');
    }
}
