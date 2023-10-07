<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
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
        return view('post')->with('Data', $Data);
    }

    public function create(Request $req)
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

    public function GetAll()
    {
        $post = Post::all();
        return json_encode($post, JSON_UNESCAPED_UNICODE);
    }
}
