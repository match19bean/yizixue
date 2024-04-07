<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function list()
    {
        $carousel = Carousel::where('is_active',1)->orderBy('sort', 'asc')->get();

        $carousel->transform(function($item){
            return [
                'image_path' => url('uploads/'.$item->image_path),
            ];
        });

        return response()->json($carousel);
    }
}
