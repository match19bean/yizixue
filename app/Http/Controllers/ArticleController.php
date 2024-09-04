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
    public function __construct()
    {
        $this->middleware(['auth', 'isEmailVerified'])->except(['getAllArticle', 'studyAbroad']);
    }

    public function getAllArticle($user_id)
    {
        $user = User::find($user_id);
        if(is_null($user)) {
            return redirect()->back();
        }
        $Data['user'] = $user;
        $Data['posts'] = $user->post()->paginate();

        return view('article.list', compact('Data'));
    }

    public function getArticle($article_id)
    {

        $article = Post::find($article_id);
        if(is_null($article)) {
            return redirect()->back();
        }
        $Data['article'] = $article;
        $Data['interested'] = PostCategoryRelation::whereIn('category_id', $article->category->pluck('category_id'))->inRandomOrder()->has('post')->take(4)->get()->unique('post_id')->pluck('post');
        return view('article.single', compact(['Data']));
    }

    public function studyAbroad(Request $request)
    {
        if($request->filled('filter')){
            if($request->filter === 'latest'){
                $Data['posts'] = Post::orderByDesc('created_at')->paginate();
            } elseif ($request->filter === 'popular') {
                $Data['posts'] = Post::withCount('likePost')->withCount('collectPost')->paginate();
            }
        } elseif ($request->filled('category_id')) {
            $Data['posts'] = Post::whereIn('id', PostCategoryRelation::select('post_id')->where('category_id', $request->category_id))->orderByDesc('created_at')->paginate();
        } elseif ($request->filled('title')) {
            $Data['posts'] = Post::where('title', 'Like', '%'.$request->title.'%')->orderByDesc('created_at')->paginate();
        } else {
            $Data['posts'] = Post::orderByDesc('created_at')->paginate();
        }

        $Data['category'] = PostCategory::all();
        return view('article.study-abroad', compact(['Data']));
    }
}
