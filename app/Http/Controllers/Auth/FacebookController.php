<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Http\Controllers\Controller;
use Auth;

class FacebookController extends Controller
{
    private $clientId = '373524802044694';
    private $clientSecret = '7e4be9ff52ce598a391d3b7686ab7707';
    private $redirectUri = 'https://yizixue.com.tw/facebook-callback';

    public function login()
    {
//        $url = 'https://www.facebook.com/v2.12/dialog/oauth?client_id=' . $this->clientId . '&redirect_uri=' . urlencode($this->redirectUri) . '&scope=email';
        $url = 'https://www.facebook.com/v19.0/dialog/oauth?client_id=' . $this->clientId . '&redirect_uri=' . urlencode($this->redirectUri) . '&scope=email';
        return redirect($url);
    }

    public function callback(Request $request)
    {
        $code = $request->input('code');

        if($request->has('error')){
            return redirect('/');
        }

        // 用 code 交換 access token
        $client = new Client();
        $response = $client->request('GET', 'https://graph.facebook.com/v19.0/oauth/access_token', [
            'query' => [
                'client_id' => $this->clientId,
                'redirect_uri' => $this->redirectUri,
                'client_secret' => $this->clientSecret,
                'code' => $code,
            ]
        ]);
        $data = json_decode($response->getBody(), true);
        $accessToken = $data['access_token'];

        // 使用 access token 獲取用戶資料
        $userResponse = $client->request('GET', 'https://graph.facebook.com/me?fields=id,name,email&access_token=' . $accessToken);
        $fb_user = json_decode($userResponse->getBody(), true);

        // 這裡可以使用 $user 進行用戶的登入或註冊邏輯
        // 例如：User::firstOrCreate([...]);
        $user = Auth::user();
        if($user != null)
        {
            if ($user->fb_auth == null) {

                $user->fb_auth = $fb_user['id'];
                $user->save();

                $theUser = User::where('fb_auth', $fb_user['id'])->first();
                Auth::login($theUser);
                return redirect('/');
            }
            else {
                Auth::login($user);
                return redirect('/');
            }
        }else{
            $find_user = User::where('fb_auth', $fb_user['id'])->first();
            if($find_user != null){
                Auth::login($find_user);
                return redirect('/');
            }else{
                $user = User::create([
                    'name' => $fb_user['name'],
                    'nickname' => $fb_user['name'],
                    'uuid' => 'post-'.uniqid(),
                    'email' => $fb_user['email'],
                    'verified' => 1,
                    'password' => bcrypt('password'),
                    'fb_auth' => $fb_user['id']
                ]);
                Auth::login($user);
                return redirect('/home');
            }
        }

        return redirect('/home');
    }

    public function delete(Request $request){
        $signed_request = $request->signed_request;
        $data = $this->parse_signed_request($signed_request);
        $user_id = $data['user_id'];

        if(!empty($user_id)){
            $user = User::where('fb_auth', $user_id)->first();
            if(!empty($user)){
                $user->fb_auth = null;
                $user->save();
            }
        }
    }
    function parse_signed_request($signed_request) {
        list($encoded_sig, $payload) = explode('.', $signed_request, 2);

        $secret = $this->clientSecret; // Use your app secret here

        // decode the data
        $sig = $this->base64_url_decode($encoded_sig);
        $data = json_decode($this->base64_url_decode($payload), true);

        // confirm the signature
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
        if ($sig !== $expected_sig) {
            error_log('Bad Signed JSON signature!');
            return null;
        }

        return $data;
    }

    function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }
}
