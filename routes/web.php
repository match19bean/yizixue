<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Response\VerifiedArrayResponse;
use Ecpay\Sdk\Services\UrlService;
use Illuminate\Http\Request;

Route::get('ecpaytest', function(){
    $factory = new Factory([
//        'hashKey' => '5294y06JbISpM5x9',
        'hashKey' => 'pwFHCqoQZGmho4w6',
//        'hashIv' => 'v77hoKGq4kWxNNIS',
        'hashIv' => 'EkRm7iFT261dpevs',
    ]);
    $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

    $input = [
//        'MerchantID' => '2000132',
//        'MerchantID' => '3002607',
        'MerchantTradeNo' => 'Test' . time(),
        'MerchantTradeDate' => date('Y/m/d H:i:s'),
        'PaymentType' => 'aio',
        'TotalAmount' => 100,
        'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
        'ItemName' => '範例商品一批 100 TWD x 1',
        'ChoosePayment' => 'Credit',
        'EncryptType' => 1,
        'OrderResultURL' => 'http://localhost/check',
        // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
        'ReturnURL' => 'http://localhost/check',
    ];
    $action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

    echo $autoSubmitFormService->generate($input, $action);
});

Route::any('ecpay-check', function(Request $request){
    logger(auth()->user());
    logger('check');
    logger($request->all());
    logger($_POST);
    $factory = new Factory([
        'hashKey' => '5294y06JbISpM5x9',
        'hashIv' => 'v77hoKGq4kWxNNIS',
    ]);
    $checkoutResponse = $factory->create(VerifiedArrayResponse::class);

// 模擬綠界付款結果回傳格式範例，非真實付款結果
//    $_POST = [
//        'MerchantID' => '2000132',
//        'MerchantTradeNo' => 'WPLL4E341E122DB44D62',
//        'PaymentDate' => '2019/05/09 00:01:21',
//        'PaymentType' => 'Credit_CreditCard',
//        'PaymentTypeChargeFee' => '1',
//        'RtnCode' => '1',
//        'RtnMsg' => '交易成功',
//        'SimulatePaid' => '0',
//        'TradeAmt' => '500',
//        'TradeDate' => '2019/05/09 00:00:18',
//        'TradeNo' => '1905090000188278',
//        'CheckMacValue' => '59B085BAEC4269DC1182D48DEF106B431055D95622EB285DECD400337144C698',
//    ];

    logger($checkoutResponse->get($_POST));
    var_dump($checkoutResponse->get($_POST));
});

Route::get('/', 'FrontPageController@index');
Route::get('introduction/{id}', 'IntroductionController@getDetial')->name('get-introduction');
Route::get('article-list/{user}', 'ArticleController@getAllArticle')->name('article-list');
Route::get('article/{article}', 'ArticleController@getArticle')->name('article');
Route::get('study-abroad', 'ArticleController@studyAbroad')->name('study-abroad');
Route::get('senior', 'SeniorController@index')->name('senior');
Route::any('line-pay/confirm', 'LinePayController@confirm')->name('line-pay-confirm');
Route::any('line-pay/cancel', 'LinePayController@cancel')->name('line-pay-cancel');
Route::get('membership-agreement', 'ContractController@membershipAgreement')->name('membership-agreement');
Route::get('service-agreement', 'ContractController@serviceAgreement')->name('service-agreement');
Route::get('disclaimer', 'ContractController@disclaimer')->name('disclaimer');
Route::get('subscription-agreement', 'ContractController@subscriptionAgreement')->name('subscription-agreement');

//line login
Route::get('/line', 'LoginController@pageLine');
Route::get('/callback/login', 'LoginController@lineLoginCallBack');

Route::get('qna', 'GuestQaController@index')->name('qna');
Route::get('qna/{id}', 'GuestQaController@show')->name('qna.show');


//LIKE
Route::get('like-user/{id}', 'LikeController@likeUser')->name('like-user');
Route::get('like-post/{id}', 'LikeController@likePost')->name('like-post');
//Collect
Route::get('collect-user/{id}', 'CollectController@collectUser')->name('collect-user');
Route::get('collect-post/{id}', 'CollectController@collectPost')->name('collect-post');
Route::get('collect-qa/{id}', 'CollectController@collectQa')->name('collect-qa');

//reference
Route::delete('reference-delete/{id}', 'UserController@referenceDelete')->name('reference-delete');
Route::get('reference-download/{id}', 'UserController@referenceDownload')->name('reference-download');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//PostController
Route::get('/list-posts', 'PostController@list')->name('list-all-posts');
Route::get('/collect-posts', 'PostController@collect')->name('collect-posts');
Route::get('create-post', 'PostController@create')->name('create-post');
Route::get('/edit-post/{uuid}', 'PostController@edit')->name('edit-post');
Route::post('/save-post', 'PostController@save')->name('save-post');
Route::post('/update-post', 'PostController@update')->name('update-post');
Route::get('/delete-post/{uuid}', 'PostController@delete')->name('delete-post');
Route::get('view-post/{uuid}', 'PostController@show')->name('view-post');

//QnAController
Route::get('/list-qa', 'QnAController@list')->name('list-all-qa');
Route::get('/collect-qa', 'QnAController@collect')->name('collect-qa');
Route::get('/create-qa', 'QnAController@create')->name('create-qa');
Route::get('/view-qa/{uuid}', 'QnAController@show')->name('view-qa');
Route::get('/view-collect-qa/{uuid}', 'QnAController@showCollectQa')->name('view-collect-qa');
Route::get('/edit-qa/{uuid}', 'QnAController@edit')->name('edit-qa');
Route::post('/save-qa', 'QnAController@save')->name('save-qa');
Route::post('/update-qa', 'QnAController@update')->name('update-qa');
Route::get('/delete-qa/{uuid}', 'QnAController@delete')->name('delete-qa');
Route::get('/delete-collect-qa/{uuid}', 'QnAController@deleteCollectQa')->name('delete-collect-qa');
Route::get('/delete-attachment/{id}', 'QnAController@deleteAttachment')->name('delete-attachment');
Route::get('/download-attachment/{id}', 'QnAController@attachmentDownload')->name('download-attachment');

Route::get('/user/get', 'UserController@getAll');
Route::get('/user/collect-user', 'UserController@collect')->name('collect-user');
Route::get('/user/skill', 'UserController@getUserBySkill');
Route::get('/user/profile', 'UserController@profile')->name('profile');
Route::post('/user/profile/update', 'UserController@update')->name('update-profile');
Route::post('/user/profile/update', 'UserController@update')->name('update-profile');
Route::get('/user/invite-list', 'UserController@showInviteList');
Route::post('/user/accept-invite/{id}', 'UserController@getInviteList')->name('accept-invite');
Route::delete('/user/delete-collect/{id}', 'UserController@deleteCollect')->name('delete-collect');

Route::get('/bulletinboard', 'BulletinBoardController@index')->name('bulletinboard');
Route::get('pay-product', 'PayProductController@index')->name('pay-product-list');
Route::post('pay-product/{id}', 'PayProductController@store')->name('pay-product');
Route::get('pay-order', 'PayOrderController@index')->name('pay-order-list');
Route::get('university-list', 'UniversityController@index')->name('university-list');

//
Route::get('carousel-list', 'CarouselController@list')->name('carousel-list');

Route::post('pay-product-ecpay/{id}', 'PayProductController@ecpayStore')->name('pay-product-ecpay');
Route::any('ecpay-order-result', 'EcpayController@ecpayOrderResult')->name('ecpay-order-result');
Route::any('ecpay-return-url', 'EcpayController@ecpayReturn')->name('ecpay-return-url');