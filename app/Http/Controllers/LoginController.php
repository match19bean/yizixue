<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\LineService;
use App\User;
use Auth;

class LoginController extends Controller
{
    protected $lineService;

    public function __construct(LineService $lineService)
    {
        $this->lineService = $lineService;
    }

    public function pageLine()
    {
        $url = $this->lineService->getLoginBaseUrl();
        return view('line')->with('url', $url);
    }

    public function lineLoginCallBack(Request $request)
    {
        try {
            $error = $request->input('error', false);
            if ($error) {
                throw new Exception($request->all());
            }
            $code = $request->input('code', '');
            $response = $this->lineService->getLineToken($code);
            $user_profile = $this->lineService->getUserProfile($response['access_token']);

            $user = Auth::user();
            if($user != null)
            {
                if ($user->line_auth == null) {

                    $user->line_auth = $user_profile['userId'];
                    $user->save();
    
                    $theUser = User::where('line_auth', $user_profile['userId'])->first();
                    Auth::login($theUser);
                    return redirect('/');
                }
                else {
                    Auth::login($user);
                    return redirect('/');
                }         
            }else{
                $find_user = User::where('line_auth', $user_profile['userId'])->first();
                if($find_user != null){
                    Auth::login($find_user);
                    return redirect('/');
                }else{
                    $user = User::create([
                        'name' => $user_profile['displayName'],
                        'nickname' => $user_profile['displayName'],
                        'uuid' => 'post-'.uniqid(),
                        'email' => $user_profile['userId'].'@line.yizixue',
                        'password' => bcrypt('password'),
                        'line_auth' => $user_profile['userId']
                    ]);
                    Auth::login($user);
                    return redirect('/home');
                }
            }
            
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }
}