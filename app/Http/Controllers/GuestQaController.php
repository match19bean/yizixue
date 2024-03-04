<?php

namespace App\Http\Controllers;

use App\Post;
use App\QACategoryRelation;
use App\QnA;
use Illuminate\Http\Request;

class GuestQaController extends Controller
{
    public function index()
    {
        $qas = QnA::with('categoryRelation')->paginate();
        $posts = Post::latest('created_at')->limit(2)->get();
        return view('guest_qa.index', compact(['qas', 'posts']));
    }

    public function show($id)
    {
        $qna = QnA::find($id);

        $sameqna = QACategoryRelation::whereIn('category_id', $qna->categoryRelation->pluck('category_id'))->inRandomOrder()->paginate();

        return view('guest_qa.show', compact(['qna', 'sameqna']));
    }
}
