<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Http\Controllers\Controller;

class FacebookController extends Controller
{
    private $clientId = '914391163652960';
    private $clientSecret = '34c24b5671b4b4d12a04547314fffffa';
    private $redirectUri = 'https://yizixue.com.tw/facebook/callback';

    public function login()
    {
//        $url = 'https://www.facebook.com/v2.12/dialog/oauth?client_id=' . $this->clientId . '&redirect_uri=' . urlencode($this->redirectUri) . '&scope=email';
        $url = 'https://www.facebook.com/v19.0/dialog/oauth?client_id=' . $this->clientId . '&redirect_uri=' . urlencode($this->redirectUri) . '&scope=email';
        return redirect($url);
    }

    public function callback(Request $request)
    {
        logger('request');
        logger($request);
        $code = $request->input('code');
        logger('code');
        // 用 code 交換 access token
        $client = new Client();
//        $response = $client->request('GET', 'https://graph.facebook.com/v2.12/oauth/access_token', [
        $response = $client->request('GET', 'https://graph.facebook.com/v19.0/oauth/access_token', [
            'query' => [
                'client_id' => $this->clientId,
                'redirect_uri' => $this->redirectUri,
                'client_secret' => $this->clientSecret,
                'code' => $code,
            ]
        ]);
        logger('response');
        logger($response);
        $data = json_decode($response->getBody(), true);
        logger('data');
        logger('data');
        $accessToken = $data['access_token'];

        // 使用 access token 獲取用戶資料
        $userResponse = $client->request('GET', 'https://graph.facebook.com/me?fields=id,name,email&access_token=' . $accessToken);
        $user = json_decode($userResponse->getBody(), true);
        logger('user');
        logger($user);

        // 這裡可以使用 $user 進行用戶的登入或註冊邏輯
        // 例如：User::firstOrCreate([...]);

        // 登入用戶
//        auth()->login($user);

        return redirect('/home');
    }
}
