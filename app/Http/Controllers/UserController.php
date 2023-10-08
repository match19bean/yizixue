<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PostTag;
use App\ProfileVideo;
use App\ProfileVoice;
use App\ProfileDescription;
use Auth;

class UserController extends Controller
{
    public function profile() 
    {
        $uid = Auth::user()->id;
        $postTag = PostTag::all();
        $profileVideo = ProfileVideo::where('uid', $uid)->first();
        $profileVoice = ProfileVoice::where('uid', $uid)->first();
        $profileDescription = ProfileDescription::where('uid', $uid)->first();

        $Data = [
            'post_tags' => $postTag,
            'profile_video' => isset($profileVideo->path)?$profileVideo->path:'',
            'profile_voice' => isset($profileVoice->path)?$profileVoice->path:'',
            'profile_description' => isset($profileDescription->description)?$profileDescription->description:'',
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
        try {
            if(isset($req->profile_video)) {
                $ProfileVideo = new ProfileVideo();
                $ProfileVideo->uid = $uid;
                $ProfileVideo->path = $req->profile_video;
                $ProfileVideo->save();
            }
            if(isset($req->profile_voice)) {
                $ProfileVoice = new ProfileVoice();
                $ProfileVoice->uid = $uid;
                $ProfileVoice->path = $req->profile_voice;
                $ProfileVoice->save();
            }
            if(isset($req->profile_description)) {
                $ProfileDescription = new ProfileDescription();
                $ProfileDescription->uid = $uid;
                $ProfileDescription->description = $req->profile_description;
                $ProfileDescription->save();
            }

        } catch (\Throwable $th) {}

        $User = User::where('id', $uid)->first();
        $User->name = isset($req->name)?$req->name:$User->name;
        $User->nickname = isset($req->nickname)?$req->nickname:$User->nickname;
        $User->university = isset($req->university)?$req->university:$User->university;
        $User->email = isset($req->email)?$req->email:$User->email;
        $User->phone = isset($req->phone)?$req->phone:$User->phone;
        $User->line = isset($req->line)?$req->line:$User->line;
        $User->address = isset($req->address)?$req->address:$User->address;
        $User->description = isset($req->description)?$req->description:$User->description;
        $User->tags = isset($req->tags)?implode(",", $req->tags):$User->tags;
        $User->avatar = $User->avatar;
        $User->student_proof = $User->student_proof;

        if($req->file('avatar')) {
            $file = $req->file('avatar');
            $fileName = time().'-'.$file->getClientOriginalName();
            $file->storeAs('images', $fileName, 'admin');
            $User->avatar = '/images/'.$fileName;
        }
        
        if($req->file('student_proof')) {
            $file = $req->file('student_proof');
            $fileName = time().'-'.$file->getClientOriginalName();
            $file->storeAs('images', $fileName, 'admin');
            $User->student_proof = '/images/'.$fileName;
        }

        $User->save();
        return back();        
    }
}
