<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectQA extends Model
{
    protected $fillable = ['uid', 'qa_id'];

    protected $table = 'collect_qa';
}
