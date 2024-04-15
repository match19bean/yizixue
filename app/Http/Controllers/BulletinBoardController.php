<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BulletinBoard;

class BulletinBoardController extends Controller
{
    function index() 
    {
        $BulletinBoard = BulletinBoard::orderByDesc('created_at')->paginate();
        $Data = [
            'bulletin_board' => $BulletinBoard
        ];
        return view('bulletinboard')->with('Data', $Data);
    }
}
