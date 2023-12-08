<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\CollectPost;
use App\PostCategory;

class PostController extends Controller
{
    public function list()
    {
        $uid = Auth::user()->id;
        $posts = Post::where('uid', $uid)->get();
        $Data = [
            'posts' => $posts,
        ];

        return view('post.list')->with('Data', $Data);
    }

    public function create()
    {
        $_categories = PostCategory::all();
        $_categoriesMap = array();
        foreach($_categories as $item)
        {
            $_categoriesMap[$item->id] = $item->name . "(". $item->slug .")";
        }
        $Data = [
            'authId' => Auth()->user()->id,
            'categories' => $_categoriesMap
        ];
        return view('post.create')->with('Data', $Data);
    }

    public function save(Request $req)
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
        $Post->uuid = 'post-'.uniqid();
        $Post->title = $title;
        $Post->uid = $author;
        $Post->category = $category;
        $Post->image_path = '/images/'.$fileName;
        $Post->state = $state;
        $Post->tag = $tag;
        $Post->body = $postbody;
        $Post->save();

        return back();
    }

    public function edit($uuid)
    {
        $uid = Auth::user()->id;
        $post = Post::where('uuid', $uuid)->first();
        $_categories = PostCategory::all();
        $_categoriesMap = array();
        foreach($_categories as $item)
        {
            $_categoriesMap[$item->id] = $item->name . "(". $item->slug .")";
        }
        $Data = [
            'post' => $post,
            'authId' => Auth()->user()->id,
            'categories' => $_categoriesMap
        ];
        return view('post.edit')->with('Data', $Data);
    }

    public function update(Request $req) 
    {
        $title = $req->title;
        $author = $req->author;
        $category = $req->category;
        $state = $req->state;
        $tag = $req->tag;
        $postbody = $req->postbody;

        $Post = Post::where('uuid', $req->uuid)->first();
        $imageFile = $Post->image_path;

        if( $req->file('image_path')!=null ) 
        {
            $file = $req->file('image_path');
            $fileName = time().'-'.$file->getClientOriginalName();
            $file->storeAs('images', $fileName, 'admin');
            $imageFile = '/images/'.$fileName;
        }
            
        $Post->title = $title;
        $Post->uid = $author;
        $Post->category = $category;
        $Post->image_path = $imageFile;
        $Post->state = $state;
        $Post->tag = $tag;
        $Post->body = $postbody;
        $Post->save();

        return back();
    }

    public function delete($uuid) 
    {
        $Post = Post::where('uuid', $uuid)->first();
        $Post->delete();

        return back();
    }

    public function collect()
    {
        $uid = User::where('id', Auth::user()->id)->first()->uuid;
        $collect = CollectPost::where('uid', $uid)->get();
        
        $posts = [];
        foreach($collect as $ele) {
            $post = Post::where('uuid', $ele->pid)->first();
            array_push($posts, $post);
        }

        // dd($collect);

        $Data = [
            'posts' => $posts,
        ];

        return view('post.collect')->with('Data', $Data);
    }
}
