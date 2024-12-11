<?php

namespace App\Http\Controllers;

use App\PhoneVerification;
use App\SmsConfirm;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class PhoneVerificationController extends Controller
{
    public function sendVerificationCode(Request $request)
    {
        $phone = $request->input('phone');
        $phone = str_replace(' ', '', $phone);
        $confirm = SmsConfirm::where('phone', $request->input('phone'))->where('country_code')->count();
        if($confirm < 0){
            return response()->json(['message' => '請先同意簡訊條款']);
        }

        if(empty($phone)) {
            return response()->json(['message' => '電話號碼必需填寫']);
        }

        if(!ctype_digit($phone)) {
            return response()->json(['message' => '請填寫正確電話號碼']);
        }

        $code = random_int(100000, 999999);
        $country_code = $request->input('country_code');

//        if(!preg_match("/^[0][1-9]{1,3}[0-9]{6,8}$/", $phone) ||
//            strlen($phone) < 10 || strlen($phone) > 11) {
//            return response()->json(['message' => '電話號碼格式有誤']);
//        }

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $fromNumber = env('TWILIO_FROM');

        PhoneVerification::updateOrCreate([
            'phone' => $phone,
            'country_code' => $country_code
        ], ['code' => $code]);

        try {
            $client = new Client($sid, $token);
            $client->messages->create('+'.$country_code.$phone, [
                'from' => $fromNumber,
                'body' => '您的驗證碼為：'.$code
            ]);
        } catch (\Exception $exception) {
            logger($exception->getMessage());
            return response()->json(['message' => $exception->getMessage()]);
        }

        return response()->json(['message' => '驗證碼已送出']);
    }

    public function verifyCode(Request $request)
    {
        $phone = $request->input('phone');
        $phone = str_replace(' ', '', $phone);
        $code = $request->input('code');
        $country_code = $request->input('country_code');

        $verification = PhoneVerification::where('country_code', $country_code)->where('phone', $phone)->first();

        if(!$verification){
            return response()->json(['message' => '驗證碼無效'], 401);
        }

        if($verification->code != $code){
            return response()->json(['message' => '驗證碼無效'], 401);
        }

        return response()->json(['message' => '驗證成功']);
    }
}
