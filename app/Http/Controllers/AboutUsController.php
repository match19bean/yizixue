<?php

namespace App\Http\Controllers;

use App\AboutUsCarousel;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $carousels = AboutUsCarousel::all();

        $managers = User::where('is_manager', true)->get();

        $content = AboutUsContent::find(1);
    }
}
