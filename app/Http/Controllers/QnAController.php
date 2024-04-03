<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\QnA;
use App\User;
use App\QACategory;
use App\QACategoryRelation;
use App\CollectQA;


class QnAController extends Controller
{
    public function list()
    {
        $uid = Auth::user()->id;
        $QnA = QnA::where('uid', $uid)->get();
        $QACategory = new QACategory;
        $QACategoryRelation = new QACategoryRelation;
        $Data = [
            'QandA' => $QnA,
            'QACategory' => $QACategory,
            'QACategoryRelation' => $QACategoryRelation
        ];

        return view('qa.list')->with('Data', $Data);
    }

    public function create()
    {
        $categories = QACategory::all();
        $Data = [
            'authId' => Auth()->user()->id,
            'categories' => $categories
        ];
        return view('qa.create')->with('Data', $Data);
    }

    public function save(Request $req)
    {

        $QnA = new QnA();
        $QnA->uuid = 'qa-'.uniqid();
        $QnA->nickname = $req->nickname;
        $QnA->email = $req->email;
        $QnA->title = $req->title;
        $QnA->phone = $req->phone;
        $QnA->line = $req->line;
        $QnA->place = $req->place;
        $QnA->uid = $req->author;
        $QnA->state = $req->state;
        $QnA->body = $req->qabody;
        $QnA->contact_time = $req->contact_time;
        $QnA->contact_time_end = $req->contact_time_end;
        $QnA->amount_up = $req->amount_up;
        $QnA->amount_down = $req->amount_down;
        $QnA->save();

        $category = $req->category;
        if(isset($category)) 
        {
            $qaId = $QnA->id;
            if($category!='') {
                foreach ($category as $cId)
                {                   
                    $qaCategoryRelation = new QACategoryRelation();
                    $qaCategoryRelation->category_id = $cId;
                    $qaCategoryRelation->qa_id = $qaId;
                    $qaCategoryRelation->save();
                }
            }
        }

        return back();
    }

    public function edit($uuid)
    {
        $uid = Auth::user()->id;
        $QnA = QnA::where('uuid', $uuid)->first();
        $categories = QACategory::all();
        $qaCategoryRelation = QACategoryRelation::where('qa_id', $QnA->id)->get();
        $selectCategories = [];
        foreach($qaCategoryRelation as $ele) {
            array_push($selectCategories, $ele->category_id);
        }

        $Data = [
            'qa' => $QnA,
            'authId' => Auth()->user()->id,
            'categories' => $categories,
            'selectCategories' => $selectCategories
        ];
        return view('qa.edit')->with('Data', $Data);
    }

    public function update(Request $req) 
    {
        logger($req->contact_time);
        logger(Carbon::parse($req->contact_time));
        $QnA = QnA::where('uuid', $req->uuid)->first();
            
        $QnA->nickname = $req->nickname;
        $QnA->title = $req->title;
        $QnA->uid = $req->author;
        $QnA->state = $req->state;
        $QnA->body = $req->qabody;
        $QnA->phone = $req->phone;
        $QnA->line = $req->line;
        $QnA->email =$req->email;
        $QnA->place = $req->place;
        $QnA->contact_time = Carbon::parse($req->contact_time)->format('Y-m-d H:i:s');
        $QnA->contact_time_end = Carbon::parse($req->contact_time_end)->format('Y-m-d H:i:s');

        $category = $req->category;
        if(isset($category)) 
        {
            $qaId = $QnA->id;
            if($category!='') {
                $qaCategory = QACategoryRelation::where('qa_id', $qaId)->delete();
                foreach ($category as $cId)
                {                   
                    $qaCategoryRelation = new QACategoryRelation();
                    $qaCategoryRelation->category_id = $cId;
                    $qaCategoryRelation->qa_id = $qaId;
                    $qaCategoryRelation->save();
                }
            }
        }

        $QnA->save();

        return back();
    }

    public function delete($uuid) 
    {
        $QnA = QnA::where('uuid', $uuid)->first();
        QACategoryRelation::where('qa_id', $QnA->id)->delete();
        CollectQA::where('qa_id', $QnA->id)->delete();
        $QnA->delete();

        return back();
    }

    public function collect()
    {
        $uid = Auth::user()->id;
        $collect = CollectQA::where('uid', $uid)->get();
        $QACategory = new QACategory;
        $QACategoryRelation = new QACategoryRelation;
        
        $qaList = [];
        foreach($collect as $ele) {
            $qa = QnA::where('id', $ele->qa_id)->first();
            array_push($qaList, $qa);
        }

        $Data = [
            'QandA' => $qaList,
            'QACategory' => $QACategory,
            'QACategoryRelation' => $QACategoryRelation
        ];

        return view('qa.collect')->with('Data', $Data);
    }

    public function show($slug)
    {
        $uid = Auth::user()->id;
        $QnA = QnA::where('uuid', $slug)->first();
        $categories = QACategory::all();
        $qaCategoryRelation = QACategoryRelation::where('qa_id', $QnA->id)->get();
        $selectCategories = [];
        foreach($qaCategoryRelation as $ele) {
            array_push($selectCategories, $ele->category_id);
        }

        $Data = [
            'qa' => $QnA,
            'authId' => Auth()->user()->id,
            'categories' => $categories,
            'selectCategories' => $selectCategories
        ];

        return view('qa.view')->with('Data', $Data);
    }
}
