<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QnA;
use Auth;

class QnAController extends Controller
{
    public function index()
    {
        return view('qapage');
    }

    public function create(Request $req)
    {
        $title = $req->title;
        $author = $req->author;
        $postbody = $req->postbody;

        $QnA = new QnA();
        $QnA->title = $title;
        $QnA->author = $author;
        $QnA->postbody = $postbody;
        $QnA->save();

        return back();
    }

    public function showMyAll()
    {
        $uid = Auth::user()->id;
        $posts = Post::where('author', $uid)->get();
        $Data = [
            'posts' => $posts,
        ];

        return view('mypost')->with('Data', $Data);
    }

}
