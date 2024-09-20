<?php

namespace App\Http\Controllers;

use App\Experience;
use App\University;
use App\UserPostCategoryRelation;
use App\UserReference;
use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\UserSkillRelation;
use App\Invite;
use App\CollectUser;
use App\PostCategory;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile() 
    {
        $uid = Auth::user()->id;
        $skills = Skill::all();
        $user_skill_relation = UserSkillRelation::where('user_id', $uid)->get();
        $userSkills = [];
        foreach($user_skill_relation as $ele) {
            array_push($userSkills, $ele->skill_id);
        }

        $Data = [
            'skills' => $skills,
            'profile_video' => Auth::user()->profile_video,
            'profile_voice' => Auth::user()->profile_voice,
            'universities' => University::all()->transform(function ($item, $key) {
                return [
                    'value' => $item->id,
                    'label' => $item->chinese_name. $item->english_name
                ];
            }),
            'categories' => PostCategory::all(),
            'user_categories' => auth()->user()->postCategory->pluck('post_category_id')->toArray(),
            'user_skills' => $userSkills,
            'user' => Auth::user()
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

        $req->validate([
            'references' => 'file|max:2048',
            'description' => 'max:1200|nullable',
            'skills' => 'array|min:0|max:9',
            'post_categories' => 'array|min:0|max:3',
            'email' => 'required_with:email|email|unique:users,email,'.auth()->user()->id,
            'learning_experience' => 'array|min:0|max:5',
            'recommender' => 'nullable|email',
            'avatar' => 'nullable|mimes:jpeg,jpg,bmp,png|max:10240'
        ], [
            'references.max.file' => '檔案不得超過2M',
            'description.max' => '字數不得超過1200字',
            'skills.max' => '專長不得超過9個',
            'post_categories.max' => '主題不得超過3個',
            'email.email' => 'Email格式不正確',
            'email.unique' => '已有相同Email註冊',
            'recommender.email' => '請填寫推薦人Email',
            'avatar.mimes' => '圖片格式不正確，請使用jpeg,jpg,bmp,png檔案',
            'avatar.max' => "圖片不得大於10MB"
        ]);

        if($req->filled('post_categories')){
            if(count($req->post_categories) >3 ){
                return back()->withInput()->withErrors(['message' => '主題不得超過三個']);
            }
        }

        $uid = $req->uid;
        $User = User::where('id', $uid)->first();
        $User->name = isset($req->name)?$req->name:$User->name;
        $User->nickname = isset($req->nickname)?$req->nickname:$User->nickname;
        $User->university = isset($req->university)?$req->university:$User->university;
        $User->is_study = $req->has('is_study')?1:0;
        $User->email = isset($req->email)?$req->email:$User->email;
        if($req->has('phone')) { $User->phone = isset($req->phone)?$req->phone:''; }
        if($req->has('line')) {$User->line = isset($req->line)?$req->line:''; }
        if($req->has('fb')) { $User->fb = isset($req->fb)?$req->fb:''; }
        if($req->has('ig')) { $User->ig = isset($req->ig)?$req->ig:''; }
        if($req->has('linkedin')) { $User->linkedin = isset($req->linkedin)?$req->linkedin:''; }
        $User->address = isset($req->address)?$req->address:$User->address;
        $User->recommender = isset($req->recommender)?$req->recommender:$User->recommender;
        if($req->has('description')) { $User->description = $req->description; }
        if($req->has('profile_video')) { $User->profile_video = $req->profile_video; }
        if($req->has('profile_voice')){ $User->profile_voice = $req->profile_voice; }
        if(isset($req->skills)) 
        {
            // dd($req->skills);
            if($req->skills!='') {
                $purgeSkills = UserSkillRelation::where('user_id', $uid)->delete();
                foreach ($req->skills as $sId)
                {
                    $userSkillRelation = new UserSkillRelation();
                    $userSkillRelation->updateOrCreate(
                        [
                            'skill_id' => $sId,
                            'user_id' => $uid
                        ]
                    );
                }
            }
        }
        if(isset($req->post_categories))
        {
            // dd($req->skills);
            if($req->post_categories!='') {
                $purgeSkills = UserPostCategoryRelation::where('user_id', $uid)->delete();
                foreach ($req->post_categories as $sId)
                {
                    $userSkillRelation = new UserPostCategoryRelation();
                    $userSkillRelation->updateOrCreate(
                        [
                            'post_category_id' => $sId,
                            'user_id' => $uid
                        ]
                    );
                }
            }
        }

        if($req->filled('learning_experience'))
        {
            $experiences = [];
            foreach($req->learning_experience as $experience)
            {
                if(!empty($experience)){
                    $insert = new Experience();
                    $insert->learning_experience = $experience;
                    $experiences[] = $insert;
                }
            }

            $User->experiences()->delete();
            $User->experiences()->saveMany($experiences);
        }

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

        if($req->file('references')){
//            foreach($req->references as $reference) {
                $fileName = time().'-'.$req->references->getClientOriginalName();
                $req->references->storeAs('references', $fileName, 'admin');
                $User->references()->create([
                    'user_id' => auth()->user()->id,
                    'image_path' => '/references/'.$fileName,
                    'file_name' => $req->references->getClientOriginalName()
                ]);
//            }
        }

        $User->save();
        return back();        
    }

    public function getUserBySkill(Request $req) 
    {
        $skillId = $req->skill_id;
        $users = [];
        $user_skill_relation = UserSkillRelation::where('skill_id', $skillId)->get();
        foreach($user_skill_relation as $ele)
        {
            $user = User::where('id', $ele->user_id)->first();
            //dd($user);
            array_push($users, $user);
        }

        $Data = [
            'users' => $users,
        ];

        return $Data;
    }

    public function showInviteList()
    {
        $uid = Auth::user()->id;
        $inviteList = Invite::where('to_uid', $uid)->get();
        $userList = [];
        foreach($inviteList as $ele)
        {
            $inviteUser = User::where('id', $ele->from_uid)->first();
            array_push($userList, $inviteUser);
        }

        $Data = [
            'InviteList' => $inviteList,
            'Skills' => new Skill,
            'UserSkillRelation' => new UserSkillRelation,
            'Users' => $userList,
            'PostCategory' => new PostCategory
        ];

        return view('user.invite-list')->with('Data', $Data);
    }

    public function collect()
    {
        $uid = Auth::user()->id;
        $collect = CollectUser::where('uid', $uid)->get();
        
        $users = [];
        foreach($collect as $ele) {
            $user = User::where('id', $ele->user_id)->first();
            array_push($users, $user);
        }

        $Data = [
            'Users' => $users,
        ];

        return view('user.collect')->with('Data', $Data);
    }

    public function referenceDelete($id)
    {
        $reference = UserReference::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if(is_null($reference)) {
            return redirect()->back();
        }

        unlink(public_path('uploads'.$reference->image_path));
        $reference->delete();

        return redirect()->back();

    }

    public function referenceDownload($id)
    {
        $file = UserReference::where('id', $id)->first();
        if(is_null($file)){
            return redirect()->back();
        }
        if(!file_exists(public_path('uploads'.$file->image_path))){
            return redirect()->back();
        }

        return response()->download(public_path('uploads'.$file->image_path, $file->file_name));
    }

    public function deleteCollect($id)
    {


        CollectUser::where('uid', auth()->user()->id)->where('user_id', $id)->delete();

        return redirect()->back();
    }
}
