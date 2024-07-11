<?php

namespace App\Http\Controllers;

use App\AboutUsCarousel;
use App\AboutUsContent;
use App\User;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $carousels = AboutUsCarousel::all();

        $managers = User::where('is_manager', true)->get();

        $content = AboutUsContent::first();

        return view('about_us',compact(['carousels','managers','content']));
    }
}
