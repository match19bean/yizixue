<?php

namespace App\Http\Controllers;

use App\LikePost;
use App\LikeUser;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeUser($id)
    {
        if(!auth()->check()){
            return response()->json([
                'message' => '請登入後再操作',
                'operator' => 'no'
            ]);
        }
        $uid = auth()->user()->id;
        $collect = LikeUser::where('uid', $uid)->where('user_id', $id)->get();
        if($collect->isNotEmpty()){
            LikeUser::where('uid', $uid)->where('user_id', $id)->delete();
            return response()->json([
                'message' => '操作成功',
                'operator' => 'reduce',
                'total' => User::find($id)->likedUser->count(),
            ]);
        } else {
            LikeUser::create([
                'uid' => $uid,
                'user_id' => $id
            ]);
            return response()->json([
                'message' => '操作成功',
                'operator' => 'add',
                'total' => User::find($id)->likedUser->count(),
            ]);
        }
    }

    public function likePost($id)
    {
        if(!auth()->check()){
            return response()->json([
                'message' => '請登入後再操作',
                'operator' => 'no'
            ]);
        }
        $uid = auth()->user()->id;
        $post = Post::find($id);
        if(is_null($post)){
            return response()->json([
                'message' => '文章不存在請重新操作',
                'operator' => 'no'
            ]);
        }
//        if($uid===$post->author->id){
//            return response()->json([
//                'message' => '無法收藏自己的文章',
//                'operator' => 'no'
//            ]);
//        }
        $collect = LikePost::where('uid', $uid)->where('post_id', $id)->get();
        if($collect->isNotEmpty()){
            LikePost::where('uid', $uid)->where('post_id', $id)->delete();
            return response()->json([
                'message' => '操作成功',
                'operator' => 'reduce',
                'total' => Post::find($id)->likePost->count(),
            ]);
        } else {
            LikePost::create([
                'uid' => $uid,
                'post_id' => $id
            ]);
            return response()->json([
                'message' => '操作成功',
                'operator' => 'add',
                'total' => Post::find($id)->likePost->count(),
            ]);
        }
    }

    public function likeQa($id)
    {

    }
}
