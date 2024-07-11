<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YizixueFaq extends Model
{
    protected $fillable = ['yizixue_faq_category_id', 'title', 'content'];

    public function yizixueFaqCategory()
    {
        return $this->belongsTo(YizixueFaqCategory::class);
    }
}
