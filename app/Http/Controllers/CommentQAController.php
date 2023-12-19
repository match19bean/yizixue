<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\QnA;
use App\CommentQA;

class CommentQAController extends Controller
{
    public function save(Request $req)
    {
        $comment = new CommentQA();
        $comment->uid = Auth::user()->id;
        $comment->qa_id = $req->qa_id;
        $comment->body = $req->comment;
        $comment->save();

        $ViewBag = [
            'message' => 'work'
        ];

        return response()->json(['code' => 200, 'data' => $ViewBag]);
    }

    public function update(Request $req) 
    {
        $comment = CommentQA::where('qa_id', $req->qa_id)->first();
        $comment->body = $req->comment;
        $comment->save();

        $ViewBag = [
            'message' => 'work'
        ];

        return response()->json(['code' => 200, 'data' => $ViewBag]);
    }

    public function delete($uuid) 
    {
        $comment = CommentQA::where('qa_id', $req->qa_id)->first();
        $comment->delete();

        $ViewBag = [
            'message' => 'work'
        ];

        return response()->json(['code' => 200, 'data' => $ViewBag]);
    }
}
