<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function create()
    {
        $_categories = Category::all();
        $_categoriesMap = array();
        foreach($_categories as $item)
        {
            $_categoriesMap[$item->id] = $item->name . "(". $item->slug .")";
        }
        $Data = [
            '_authId' => Auth()->user()->id,
            '_categories' => $_categoriesMap
        ];
        return view('post.create')->with('Data', $Data);
    }

    public function insert(Request $req)
    {
        $title = $req->title;
        $author = $req->author;
        $category = $req->category;
        $state = $req->state;
        $tag = $req->tag;
        $postbody = $req->postbody;

        $file = $req->file('image_path');
        $fileName = time().'-'.$file->getClientOriginalName();
        //If you want to specify the disk, you can pass that as the third parameter.
        $file->storeAs('images', $fileName, 'admin');

        $Post = new Post();
        $Post->title = $title;
        $Post->author = $author;
        $Post->category = $category;
        $Post->image_path = '/images/'.$fileName;
        $Post->state = $state;
        $Post->tag = $tag;
        $Post->body = $postbody;
        $Post->save();

        return back();
    }

    public function all()
    {
        $uid = Auth::user()->id;
        $posts = Post::where('author', $uid)->get();
        $Data = [
            'posts' => $posts,
        ];

        return view('post.all')->with('Data', $Data);
    }

    public function edit(Request $req)
    {
        $uid = Auth::user()->id;
        $posts = Post::where('author', $uid)->get();
        if(isset($req->post_id)) {
            $posts = Post::where('author', $uid)
                    ->where('id', $req->post_id)
                    ->get();
        }

        $Data = [
            'posts' => $posts,
        ];
        return view('post.all')->with('Data', $Data);
        
    }

    function update() {
        
    }
}
