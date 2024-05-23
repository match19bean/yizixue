<?php

namespace App\Http\Controllers;

use App\PayOrder;
use App\User;
use Carbon\Carbon;
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Response\VerifiedArrayResponse;
use Illuminate\Http\Request;

class EcpayController extends Controller
{
    public function ecpayOrderResult(Request $request)
    {
        return redirect(route('pay-product-list'));
    }

    public function ecpayReturn(Request $request)
    {
        $factory = new Factory([
            'hashKey' => config('ecpay.hashKey'),
            'hashIv' => config('ecpay.hashIv'),
        ]);
        $checkoutResponse = $factory->create(VerifiedArrayResponse::class);

        $result = $checkoutResponse->get($_POST);
        if($result['RtnCode'] === '1'){
            $order = PayOrder::where('transactionId', $result['MerchantTradeNo'])->get();
            if(is_null($order)){
                return route('pay-product-list')->with(['message' =>'未查詢到'.$result['MerchantTradeNo']]);
            }
            $order->first()->update([
                'order_status' => 4
            ]);

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

        } else {
            $order = PayOrder::where('transactionId', $result['MerchantTradeNo'])->get();
            if(is_null($order)){
                return route('pay-product-list')->with(['message' =>'未查詢到'.$result['MerchantTradeNo']]);
            }
            $order->first()->update([
                'order_status' => 3
            ]);
        }
        //需回傳1|OK
        return response()->json(['1|OK']);
    }
}
