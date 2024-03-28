<?php

namespace App\Http\Controllers;

use App\LikePost;
use App\Post;
use App\PostCategory;
use App\PostCategoryRelation;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function getAllArticle($user_id)
    {
        $user = User::find($user_id);
        $Data['user'] = $user;
        $Data['posts'] = $user->post()->paginate();

        return view('article.list', compact('Data'));
    }

    public function getArticle($article_id)
    {
        $article = Post::find($article_id);
        $Data['article'] = $article;
        $Data['interested'] = PostCategoryRelation::whereIn('category_id', $article->category->pluck('category_id'))->inRandomOrder()->with('post')->limit(4)->get()->unique('post_id')->pluck('post');

        return view('article.single', compact(['Data']));
    }

    public function studyAbroad(Request $request)
    {
        if($request->filled('filter')){
            if($request->filter === 'latest'){
                $Data['posts'] = Post::orderBy('created_at', 'desc')->paginate();
            } elseif ($request->filter === 'popular') {
                $Data['posts'] = LikePost::select('post_id')->groupBy('post_id')->with('post', 'post.author')->paginate();
            }
        } elseif ($request->filled('category_id')) {
            $Data['posts'] = PostCategoryRelation::where('category_id', $request->category_id)->with('post')->paginate();
        } elseif ($request->filled('title')) {
            $Data['posts'] = Post::where('title', 'Like', '%'.$request->title.'%')->paginate();
        } else {
            $Data['posts'] = Post::paginate();
        }




        $Data['category'] = PostCategory::all();
        return view('article.study-abroad', compact(['Data']));
    }
}
