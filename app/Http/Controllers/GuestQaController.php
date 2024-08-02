<?php

namespace App\Http\Controllers;

use App\Post;
use App\QACategory;
use App\QACategoryRelation;
use App\QnA;
use Illuminate\Http\Request;

class GuestQaController extends Controller
{
    public function index(Request $request)
    {

        $query = QnA::query();

        if($request->filled('category_id')){
            $qas_id = QACategoryRelation::where('category_id', $request->category_id)->pluck('qa_id');
            $query->whereIn('id', $qas_id);
        }

        $qas = $query->with('categoryRelation')->orderByDesc('created_at')->paginate(5);
        $posts = Post::latest('created_at')->limit(2)->get();
        $categories = QACategory::all();
        return view('guest_qa.index', compact(['qas', 'posts', 'categories']));
    }

    public function show($id)
    {
        $qna = QnA::find($id);
        if(is_null($qna)){
            return redirect()->back();
        }
        $sameqna = QACategoryRelation::whereIn('category_id', $qna->categoryRelation->pluck('category_id'))->inRandomOrder()->orderByDesc('created_at')->paginate(6);
        $categories = QACategory::all();
        return view('guest_qa.show', compact(['qna', 'sameqna', 'categories']));
    }
}
