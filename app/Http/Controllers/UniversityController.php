<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UniversityController extends Controller
{
    public function index(Request $request)
    {
        $query = (new University)->query();
        if($request->filled('country'))
        {
            $query->where("country", Str::upper($request->country));
        }
        if($request->filled('area'))
        {
            $query->where("area", Str::upper($request->area));
        }

//        if($request->filled('filter')){
//            $query->orWhere('chinese_name', 'LIKE', '%'.$request->filter. '%')
//                ->orWhere('english_name', 'LIKE', '%'.$request->filter.'%')
//                ->orWhere('country', 'LIKE', '%'.$request->filter.'%');
//        }

        $universities = $query->with('users')->paginate();
        return view('university.index', compact(['universities']));
    }

    public function search(Request $request)
    {
        $query = (new University)->query();

        if($request->filled('university')){
            $query->where('chinese_name', 'like', '%'.$request->university.'%')->orWhere('english_name', 'like', '%'.$request->university.'%');
        }

        $result = $query->get();

        $result->transform(function($item){
            return [
                'id' => $item->id,
                'text' => $item->english_name.$item->chinese_name
            ];
        });

        return response()->json([
            'data' => $result
        ]);
    }
}
