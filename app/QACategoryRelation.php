<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QACategoryRelation extends Model
{
    protected $table = 'qa_category_relation';

    public function category()
    {
        return $this->belongsTo(QACategory::class, 'category_id');
    }

    public function qa()
    {
        return $this->belongsTo(QnA::class, 'qa_id');
    }
}
