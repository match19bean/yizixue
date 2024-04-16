<?php

namespace App\Observers;

use App\Skill;
use App\UserSkillRelation;

class SkillObserver
{
    public function deleted(Skill $skill)
    {
        UserSkillRelation::where('skill_id', $skill->id)->delete();
    }
}