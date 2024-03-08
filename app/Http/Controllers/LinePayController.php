<?php

namespace App\Http\Controllers;

use App\PayOrder;
use App\Services\LinePayService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LinePayController extends Controller
{
    public function confirm(Request $request)
    {
        $linePay = new LinePayService([
            'channelId' => config('linepay.channelId'),
            'channelSecret' => config('linepay.channelSecret'),
            'isSandbox' => config('linepay.isSandbox')
        ]);

        $order = PayOrder::where('transactionId', $request->transactionId)->get();

        if(is_null($order)){
            return route('pay-product-list')->with(['message' =>'未查詢到'.$transaction_id]);
        }

        $response = $linePay->confirm($order->first()->transactionId, [
            'amount' => (integer)$order->first()->product->price,
            'currency' => 'TWD'
        ]);

        if(!$response->isSuccessful()) {
            $order->first()->update([
                'order_status' => 3
            ]);
        } else {
            $order->first()->update([
                'order_status' => 4
            ]);
        }

        $user = User::find($order->first()->user_id);
        if($user->expired >= now()){
            $add_time = Carbon::parse($user->expired)->addMonth($order->first()->product->pay_time);
            $remark = $user->expired . '->' .$add_time;
            $user->update([
                'role' => 'vip',
                'expired' => $add_time
            ]);
            $order->first()->update([
                'remark' => $remark
            ]);
        } else {
            $add_time = now()->addMonth($order->first()->product->pay_time);
            $remark = $user->expired . '->' .$add_time;
            $user->update([
                'role' => 'vip',
                'expired' => $add_time
            ]);
            $order->first()->update([
                'remark' => $remark
            ]);
        }

        return redirect(route('pay-order-list'));
    }

    public function cancel()
    {
        return redirect(route('pay-product-list'));
    }
}
