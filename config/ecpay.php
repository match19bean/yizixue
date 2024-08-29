<?php

return [
    'hashKey' => env('ECPAY_HASH_KEY'),
    'hashIv' => env('ECPAY_HASH_IV'),
    'isSandbox' => false,
    'merchantID' => env('ECPAY_MERCHANT_ID'),
];