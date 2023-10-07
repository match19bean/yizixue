<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PostTag;
use Auth;

class UserController extends Controller
{
    public function profile() 
    {
        $postTag = PostTag::all();
        $Data = [
            'post_tags' => $postTag
        ];
        return view('user.profile')->with('Data', $Data);
    }

    public function getAll()
    {
        $User = User::all();
        return json_encode($User, JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $req) 
    {
        $uid = $req->uid;
        $User = User::where('id', $uid)->first();
        if(isset($req->description))
        {
            $description = $req->description;
            $User->description = $description;
            $User->save();
        } else {
            $User->name = $req->uname;
            $User->email = $req->email;
            $User->phone = $req->phone;
            $User->line = $req->line;
            $User->address = $req->address;
        }

        $User->save();
        return back();        
    }
}
