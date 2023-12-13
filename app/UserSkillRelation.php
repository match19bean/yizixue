<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkillRelation extends Model
{
    protected $fillable = ['skill_id', 'user_id'];
    protected $table = 'user_skill_relation';
}
