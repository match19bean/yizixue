<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
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
            if($university->isNotEmpty()){
                $query->whereIn('university', $university->pluck('id'));
            }
        }

        if($request->filled('country'))
        {
            $university = University::where('country', Str::upper($request->country))->get();
            if($university->isNotEmpty()){
                $query->whereIn('university', $university->pluck('id'));
            }
        }

        $users = $query->paginate();

        return view('senior.index', compact('users'));
    }
}
