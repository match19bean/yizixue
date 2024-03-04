<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SeniorController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'vip')->where('expired', '>=', now())->paginate();

        return view('senior.index', compact('users'));
    }
}
