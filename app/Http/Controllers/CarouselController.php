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
                'image_path' => (str_starts_with('/', $item->image_path)) ? str_replace(' ', '%20', url('uploads'.$item->image_path)) : str_replace(' ', '%20', url('uploads/'.$item->image_path)),
                'description1' => $item->description1,
                'description2' => $item->description2,
            ];
        });

        return response()->json($carousel);
    }
}
