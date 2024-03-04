<?php

namespace App\Http\Controllers;

use App\QACategory;
use App\QACategoryRelation;
use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\UserSkillRelation;
use App\Invite;
use App\CollectUser;
use App\PostCategory;
use App\University;
use Auth;

class FrontPageController extends Controller
{
    public function index()
    {
        $Data = [
            'Skills' => new Skill,
            'UserSkillRelation' => new UserSkillRelation,
            'Users' => User::all(),
            'University' => University::all(),
            'PostCategory' => new PostCategory,
            'Qas' => QACategoryRelation::all()->groupBy('category_id')
        ];

        return view('welcome')->with('Data', $Data);
    }
}
