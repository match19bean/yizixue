<?php

namespace App\Http\Controllers;

use App\PayOrder;
use App\PayProduct;
use App\Services\LinePayService;
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
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
            return back()->with(['message' => '產品錯誤請重新選擇']);
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

    public function ecpayStore($id)
    {
        $product = PayProduct::find($id);
        if(is_null($product)) {
            return back()->with(['message' => '產品錯誤請重新選擇']);
        }

        $order = PayOrder::create([
            'user_id' => auth()->user()->id,
            'pay_product_id' => $id,
            'is_sandbox' => config('ecpay.isSandbox')
        ]);

        $factory = new Factory([
            'hashKey' => config('ecpay.hashKey'),
            'hashIv' => config('ecpay.hashIv'),
        ]);
        logger(config('ecpay.hashKey'));
        $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');
        $sn = "SN".date('YmdHis').$order->id;
        $order->update([
            'transactionId' => $sn
        ]);

        $input = [
            'MerchantID' => config('ecpay.merchantID'),
            'MerchantTradeNo' => $sn,
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'PaymentType' => 'aio',
            'TotalAmount' => $product->price,
            'TradeDesc' => UrlService::ecpayUrlEncode($product->name),
            'ItemName' => $product->name,
            'ChoosePayment' => 'Credit',
            'EncryptType' => 1,
            'OrderResultURL' => route('ecpay-order-result'),
            // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
            'ReturnURL' => route('ecpay-return-url'),
        ];
        if(config('ecpay.isSandbox')) {
            $action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';
        } else {
            $action = 'https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5';
        }

        return $autoSubmitFormService->generate($input, $action);
    }
}
