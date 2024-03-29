<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\CollectPost;
use App\PostCategory;
use App\PostCategoryRelation;

class PostController extends Controller
{
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

        if(is_null($user) || $user->expired < now()){
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

        return back();
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
        $Post->delete();
        PostCategoryRelation::where('post_id', $Post->id)->delete();

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
}
