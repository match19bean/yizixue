<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
use Illuminate\Http\Request;

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


        $users = $query->inRandomOrder()->paginate();

        return view('senior.index', compact('users'));
    }
}
