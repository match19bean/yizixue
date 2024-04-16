<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QACategory extends Model
{
    protected $table = 'post_category';

    public function QACategoryRelation()
    {
        return $this->hasMany(QACategoryRelation::class, 'category_id');
    }
}
