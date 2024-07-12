<?php

namespace App\Http\Controllers;

use App\PostCategory;
use App\University;
use App\User;
use App\UserPostCategoryRelation;
use App\UserSkillRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeniorController extends Controller
{
    public function index(Request $request)
    {


        $query = (new User)->query();
        $query->where('role', 'vip')->where('expired', '>=', now());

        if($request->filled('university'))
        {
            $university = University::where('slug', $request->university)->get();
            if($university->isNotEmpty()){
                $query->where('university', $university->first()->id);
            }
        }

        if($request->filled('area'))
        {
            $university = University::where('area', Str::upper($request->area))->get();
            $query->whereIn('university', $university->pluck('id'));
        }

        if($request->filled('skill'))
        {
            $query->whereIn('id', UserSkillRelation::select('user_id')->where('skill_id', $request->skill));
        }

        if($request->filled('country'))
        {
            $university = University::where('country', Str::upper($request->country))->get();
            if($university->isNotEmpty()){
                $query->whereIn('university', $university->pluck('id'));
            }
        }

        if($request->filled('category'))
        {
            $query->whereIn('id', UserPostCategoryRelation::select('user_id')->where('post_category_id', $request->category)->get());
        }

        $users = $query->paginate();
        $post_categories = PostCategory::all();
        return view('senior.index', compact(['users', 'post_categories']));
    }
}
