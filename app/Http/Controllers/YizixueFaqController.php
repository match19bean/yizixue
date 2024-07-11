<?php

namespace App\Http\Controllers;

use App\YizixueFaq;
use App\YizixueFaqCarousel;
use App\YizixueFaqCategory;
use Illuminate\Http\Request;

class YizixueFaqController extends Controller
{
    public function index()
    {
        $categories = YizixueFaqCategory::all();
        $contents = YizixueFaq::all();
        $image = YizixueFaqCarousel::first();

        return view('yizixueFAQ', compact(['categories', 'contents', 'image']));
    }
}
