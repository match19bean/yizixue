<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
    public function image(Request $request){
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = time().'-'.$file->getClientOriginalName();
            $file->storeAs('images', $fileName, 'admin');
            return json_encode(['location'=>url('uploads/images/'.$fileName)]);
        }
    }
}
