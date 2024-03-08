<?php

namespace App\Http\Controllers;

use App\PayOrder;
use App\PayProduct;
use App\Services\LinePayService;
use Illuminate\Http\Request;

class PayProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = PayProduct::all();

        return view('pay_product.index', compact(['products']));
    }

    public function store($id)
    {
        $product = PayProduct::find($id);
        if(is_null($product)) {
            return back()->wiht(['message' => '產品錯誤請重新選擇']);
        }

        $order = PayOrder::create([
            'user_id' => auth()->user()->id,
            'pay_product_id' => $id,
            'is_sandbox' => config('linepay.isSandbox')
        ]);

        $linePay = new LinePayService([
            'channelId' => config('linepay.channelId'),
            'channelSecret' => config('linepay.channelSecret'),
            'isSandbox' => config('linepay.isSandbox')
        ]);

        $orderParams = [
            'amount' => (integer) $product->price,
            'currency' => 'TWD',
            'orderId' => "SN".date('YmdHis').$order->id,
            'packages' => [
                [
                    'id' => $order->id,
                    'amount' => (integer)$product->price,
                    'name' => $product->name,
                    'products' => [
                        [
                            'name' => $product->name,
                            'quantity' => 1,
                            'price' => (integer)$product->price,
                        ],
                    ],
                ],
            ],
            'redirectUrls' => [
                'confirmUrl' => route('line-pay-confirm'),
                'cancelUrl' => route('line-pay-cancel')
            ],
            'options' => [
                'display' => [
                    "checkConfirmUrlBrowser" => true
                ]
            ]
        ];

        $response = $linePay->request($orderParams);

        if(!$response->isSuccessful()) {
            return back()->with(['message' => '與第三方支付連線失敗，請重新操作']);
        }

        $order->update([
            'transactionId' => (string)$response['info']['transactionId']
        ]);

        return redirect($response->getPaymentUrl());
    }
}
