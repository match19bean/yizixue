<?php

namespace App\Http\Controllers;

use App\Post;
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
use Illuminate\Support\Str;

class FrontPageController extends Controller
{
    public function index()
    {
        $Data = [
            'Skills' => new Skill,
            'UserSkillRelation' => new UserSkillRelation,
            'Users' => User::all(),
            'University' => University::with('users')->inRandomOrder()->limit(6)->get(),
            'PostCategory' => new PostCategory,
            'QaCategory' => QACategory::with('QACategoryRelation')->get(),
            'Post' => Post::inRandomOrder()->first()
        ];

//        dd($Data['University']);
        return view('welcome')->with('Data', $Data);
    }

    public function random()
    {
        $posts = Post::with('category.postCategory')->inRandomOrder()->limit(3)->get();
        $posts->transform(function($item){
            return [
                'id' => $item->id,
                'body' => Str::limit(htmlspecialchars($item->body)),
                'title' => $item->title,
                'image_path' => $item->image_path,
                "category" => $item->category
            ];
        });
        return response()->json($posts);
    }
}
