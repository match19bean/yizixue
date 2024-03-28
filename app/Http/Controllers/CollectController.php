<?php

namespace App\Http\Controllers;

use App\CollectPost;
use App\CollectUser;
use App\Post;
use Illuminate\Http\Request;

class CollectController extends Controller
{
    public function collectUser($id)
    {
        if(!auth()->check()){
            return response()->json([
                'message' => '請登入後再操作',
                'operator' => 'no'
            ]);
        }
        $uid = auth()->user()->id;
        if($uid === $id) {
            return response()->json([
                'message' => '自己無法收藏自己',
                'operator' => 'no'
            ]);
        }
        $collect = CollectUser::where('uid', $uid)->where('user_id', $id)->get();
        if($collect->isNotEmpty()){
            CollectUser::where('uid', $uid)->where('user_id', $id)->delete();
            return response()->json([
                'message' => '操作成功',
                'operator' => 'reduce'
            ]);
        } else {
            CollectUser::create([
                'uid' => $uid,
                'user_id' => $id
            ]);
            return response()->json([
                'message' => '操作成功',
                'operator' => 'add'
            ]);
        }

    }

    public function collectPost(Request $request)
    {
        if(!auth()->check()){
            return response()->json([
                'message' => '請登入後再操作',
                'operator' => 'no'
            ]);
        }
        $uid = auth()->user()->id;
        $post = Post::find($request->id);
        if(is_null($post)){
            return response()->json([
                'message' => '文章不存在請重新操作',
                'operator' => 'no'
            ]);
        }
        if($uid===$post->author->id){
            return response()->json([
                'message' => '無法收藏自己的文章',
                'operator' => 'no'
            ]);
        }
        $collect = CollectPost::where('uid', $uid)->where('post_id', $request->id)->get();
        if($collect->isNotEmpty()){
            CollectPost::where('uid', $uid)->where('post_id', $request->id)->delete();
            return response()->json([
                'message' => '操作成功',
                'operator' => 'reduce'
            ]);
        } else {
            CollectPost::create([
                'uid' => $uid,
                'post_id' => $request->id
            ]);
            return response()->json([
                'message' => '操作成功',
                'operator' => 'add'
            ]);
        }

    }
}
