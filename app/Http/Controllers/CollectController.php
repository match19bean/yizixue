<?php

namespace App\Http\Controllers;

use App\CollectPost;
use App\CollectQA;
use App\CollectUser;
use App\Post;
use App\QnA;
use App\User;
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
                'operator' => 'reduce',
                'total' => User::find($id)->collectedUser->count(),
            ]);
        } else {
            CollectUser::create([
                'uid' => $uid,
                'user_id' => $id
            ]);
            return response()->json([
                'message' => '操作成功',
                'operator' => 'add',
                'total' => User::find($id)->collectedUser->count(),
            ]);
        }

    }

    public function collectPost($id)
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
        if($uid===$post->author->id){
            return response()->json([
                'message' => '無法收藏自己的文章',
                'operator' => 'no'
            ]);
        }
        $collect = CollectPost::where('uid', $uid)->where('post_id', $id)->get();
        if($collect->isNotEmpty()){
            CollectPost::where('uid', $uid)->where('post_id', $id)->delete();
            return response()->json([
                'message' => '操作成功',
                'operator' => 'reduce',
                'total' => Post::find($id)->collectPost->count(),
            ]);
        } else {
            CollectPost::create([
                'uid' => $uid,
                'post_id' => $id
            ]);
            return response()->json([
                'message' => '操作成功',
                'operator' => 'add',
                'total' => Post::find($id)->collectPost->count(),
            ]);
        }
    }

    public function collectQa($id)
    {
        if(!auth()->check()){
            return response()->json([
                'message' => '請登入後再操作',
                'operator' => 'no'
            ]);
        }
        $uid = auth()->user()->id;
        $post = QnA::find($id);
        if(is_null($post)){
            return response()->json([
                'message' => '問與答不存在請重新操作',
                'operator' => 'no'
            ]);
        }
        if($uid===$post->author->id){
            return response()->json([
                'message' => '無法收藏自己的問與答',
                'operator' => 'no'
            ]);
        }
        $collect = CollectQA::where('uid', $uid)->where('qa_id', $id)->get();
        if($collect->isNotEmpty()){
            CollectQA::where('uid', $uid)->where('qa_id', $id)->delete();
            return response()->json([
                'message' => '操作成功',
                'operator' => 'reduce',
                'total' => QnA::find($id)->collectQa->count(),
            ]);
        } else {
            CollectQA::create([
                'uid' => $uid,
                'qa_id' => $id
            ]);
            return response()->json([
                'message' => '操作成功',
                'operator' => 'add',
                'total' => QnA::find($id)->collectQa->count(),
            ]);
        }
    }
}
