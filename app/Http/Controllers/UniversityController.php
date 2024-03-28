<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index(Request $request)
    {
        $query = (new University)->query();
        if($request->filled('country'))
        {
            $query->where("country", $request->country);
        }
        $universities = $query->with('users')->paginate();
        return view('university.index', compact(['universities']));
    }
}
