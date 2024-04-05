<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{

    public function getDetial($id)
    {
        $user = User::with('post')->with('postCategory')->with('skills')->with('likeUser')->with('collectUser')->find($id);
        if(is_null($user)){
            return back();
        }

        $Data['user'] = $user;
        $Data['vip'] = User::with('postCategory')->with('skills')->get();

        return view('introduciton.index', compact(['Data']));
    }
}
