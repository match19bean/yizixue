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
            'University' => University::with('users')->inRandomOrder()->get(),
            'PostCategory' => new PostCategory,
            'Qas1' => QACategoryRelation::whereIn('category_id',[1,2,3,4])->get()->groupBy('category_id'),
            'Qas2' => QACategoryRelation::whereIn('category_id',[5,6,7,8])->get()->groupBy('category_id'),
            'QaCategory' => QACategory::with('QACategoryRelation')->get()
        ];
//        dd($Data['Qas1']);

        return view('welcome')->with('Data', $Data);
    }
}
