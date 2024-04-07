<?php

namespace App\Http\Controllers;

use App\LikePost;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\CollectPost;
use App\PostCategory;
use App\PostCategoryRelation;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function list()
    {
        $uid = Auth::user()->id;
        $posts = Post::where('uid', $uid)->get();
        $QACategory = new PostCategory;
        $QACategoryRelation = new PostCategoryRelation;
        $Data = [
            'posts' => $posts,
            'QACategory' => $QACategory,
            'QACategoryRelation' => $QACategoryRelation
        ];

        return view('post.list')->with('Data', $Data);
    }

    public function create()
    {
        $user = auth()->user();

        if(is_null($user)){
            return redirect()->back();
        }
        if($user->expired < now()){
            return redirect()->route('pay-product-list');
        }

        $categories = PostCategory::all();
        $Data = [
            'authId' => Auth()->user()->id,
            'categories' => $categories
        ];
        return view('post.create')->with('Data', $Data);
    }

    public function save(Request $req)
    {

        $req->validate([
            'category' => 'array|max:3',
        ],[
            'category.max' => '不得超過:max個主題',
        ]);

        $title = $req->title;
        $author = $req->author;
        $category = $req->category;
        $state = $req->state;
        $tag = $req->tag;
        $postbody = $req->postbody;

        if($req->has('image_path')){
            $file = $req->file('image_path');
            $fileName = time().'-'.$file->getClientOriginalName();
            //If you want to specify the disk, you can pass that as the third parameter.
            $file->storeAs('images', $fileName, 'admin');
        } else {
            $fileName = 'default_avatar.png';
        }


        $Post = new Post();
        $Post->uuid = 'post-'.uniqid();
        $Post->title = $title;
        $Post->uid = $author;
        $Post->image_path = '/images/'.$fileName;
        $Post->state = $state;
        $Post->body = $postbody;
        $Post->save();

        if(isset($category)) 
        {
            
            $pId = $Post->id;
            if($category!='') {
                foreach ($category as $cId)
                {                   
                    $postCategoryRelation = new PostCategoryRelation();
                    $postCategoryRelation->category_id = $cId;
                    $postCategoryRelation->post_id = $pId;
                    $postCategoryRelation->save();
                }
            }
        }

        return redirect()->route('list-all-posts');
    }

    public function edit($uuid)
    {
        $uid = Auth::user()->id;
        $post = Post::where('uuid', $uuid)->first();
        $categories = PostCategory::all();
        $postCategoryRelation = PostCategoryRelation::where('post_id', $post->id)->get();
        $selectCategories = [];
        foreach($postCategoryRelation as $ele) {
            array_push($selectCategories, $ele->category_id);
        }

        $Data = [
            'post' => $post,
            'authId' => Auth()->user()->id,
            'categories' => $categories,
            'selectCategories' => $selectCategories
        ];
        return view('post.edit')->with('Data', $Data);
    }

    public function update(Request $req) 
    {
        $req->validate([
            'category' => 'array|max:3'
        ],[
            'category.max' => '不得超過:max個主題'
        ]);

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

        if(isset($category)) 
        {
            $pId = $Post->id;
            if($category!='') {
                $postCategory = PostCategoryRelation::where('post_id', $pId)->delete();
                foreach ($category as $cId)
                {                   
                    $postCategoryRelation = new PostCategoryRelation();
                    $postCategoryRelation->category_id = $cId;
                    $postCategoryRelation->post_id = $pId;
                    $postCategoryRelation->save();
                }
            }
        }

        $Post->image_path = $imageFile;
        $Post->state = $state;
        $Post->body = $postbody;
        $Post->save();

        return back();
    }

    public function delete($uuid) 
    {
        $Post = Post::where('uuid', $uuid)->first();
        if(is_null($Post)){
            return back();
        }
        PostCategoryRelation::where('post_id', $Post->id)->delete();
        LikePost::where('post_id', $Post->id)->delete();
        CollectPost::where('post_Id', $Post->id)->delete();
        if(file_exists(public_path('uploads'.$Post->image_path)) && $Post->image_path != '/images/default_avatar.png '){
            unlink(public_path('uploads'.$Post->image_path));
        }
        $Post->delete();

        return back();
    }

    public function collect()
    {
        $uid = Auth::user()->id;
        $collect = CollectPost::where('uid', $uid)->get();
        
        $posts = [];
        foreach($collect as $ele) {
            $post = Post::where('id', $ele->post_id)->first();
            array_push($posts, $post);
        }


        $Data = [
            'posts' => $posts,
        ];

        return view('post.collect')->with('Data', $Data);
    }

    public function show($uuid)
    {
        $uid = Auth::user()->id;
        $post = Post::where('uuid', $uuid)->where('uid', $uid)->first();

        if(is_null($post)) {
            return redirect()->back();
        }

        $Data = [
            'article' => $post
        ];

        return view('post.show')->with('Data', $Data);
    }
}
