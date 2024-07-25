<?php

namespace App\Observers;

use App\CollectPost;
use App\CollectQA;
use App\CollectUser;
use App\Http\Controllers\CollectController;
use App\LikePost;
use App\LikeUser;
use App\PayOrder;
use App\Post;
use App\PostCategoryRelation;
use App\QnA;
use App\UserPostCategoryRelation;
use App\UserReference;
use App\UserSkillRelation;

class UserObserver
{
    public function deleted($user)
    {
        CollectPost::where('uid', $user->id)->delete();
        CollectQa::where('uid', $user->id)->delete();
        CollectUser::where('uid', $user->id)->orWhere('user_id', $user->id)->delete();
        CollectPost::where('uid', $user->id)->delete();
        LikePost::where('uid', $user->id)->delete();
        LikeUser::where('uid', $user->id)->orWhere('user_id', $user->id)->delete();
        PayOrder::where('user_id', $user->id)->delete();
        $user->references->each(function($item){
            if(file_exists(public_path('uploads'.$item->image_path))){
                unlink(public_path('uploads'.$item->image_path));
            }
            $item->delete();
        });
        $user->skills->each(function($item){
            $item->delete();
        });
        $user->QA->each(function($qna){
            $qna->attachments->each(function($attachment){
               if(file_exists(public_path('uploads'.$attachment->file_path))){
                   unlink(public_path('uploads'.$attachment->file_path));
               }
               $attachment->delete();
            });
            $qna->delete();
        });
        $user->post->each(function($post){
           PostCategoryRelation::where('post_id', $post->id)->delete();
           if(file_exists(public_path('uploads'.$post->image_path)) && $post->image_path !== '/images/default_avatar.png'){
               unlink(public_path('uploads'.$post->image_path));
           }
           $post->delete();
        });
        if(file_exists(public_path('uploads'.$user->student_proof))){
            unlink(public_path('uploads'.$user->student_proof));
        }

        if(!empty($user->avatar) && file_exists(public_path('uploads'.$user->avatar))){
            unlink(public_path('uploads'.$user->avatar));
        }

        if(!empty($user->avatar) && file_exists(public_path('uploads/'.$user->avatar))){
            unlink(public_path('uploads/'.$user->avatar));
        }
    }
}