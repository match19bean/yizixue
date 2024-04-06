<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QnaAttachment extends Model
{
    protected $fillable = ['qa_id', 'file_name', 'file_path'];

    public function Qa()
    {
        return $this->belongsTo(QnA::class);
    }
}
