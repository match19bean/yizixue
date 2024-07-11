<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUsCarousel extends Model
{
    protected $fillable = ['image_path', 'is_active', 'sort'];
}
