<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YizixueFaqCategory extends Model
{
    protected $fillable = ['name'];

    public function faqs()
    {
        return $this->hasMany(YizixueFaq::class);
    }
}
