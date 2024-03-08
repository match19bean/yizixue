<?php

namespace App\Http\Controllers;

use App\PayOrder;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        $orders = PayOrder::where('user_id', $user->id)->where('order_status', 4)->paginate();

        return view('user.pay-order', compact(['orders']));
    }
}
