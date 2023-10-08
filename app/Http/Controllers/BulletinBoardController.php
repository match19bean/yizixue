<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BulletinBoard;

class BulletinBoardController extends Controller
{
    function index() 
    {
        $BulletinBoard = BulletinBoard::all();
        $Data = [
            'bulletin_board' => $BulletinBoard
        ];
        return view('bulletinboard')->with('Data', $Data);
    }
}
