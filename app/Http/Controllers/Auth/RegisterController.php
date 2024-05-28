<?php

namespace App\Http\Controllers\Auth;

use App\University;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Lunaweb\EmailVerification\Traits\VerifiesEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, VerifiesEmail;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
        $this->middleware('guest', ['except' => ['verify', 'showResendVerificationEmailForm', 'resendVerificationEmail']]);
        $this->middleware('auth', ['only' => ['showResendVerificationEmailForm', 'resendVerificationEmail']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'university' => 'required|exists:university,id',
            'password' => 'required|string|min:6|confirmed',
            'check_contract' => 'required|boolean',
            'nickname' => 'required|string'
        ], [
            'name.required' => '姓名欄位必需填寫',
            'name.string' => '姓名必需填寫文字',
            'name.max' => '姓名最長 :max 字',
            'email.required' => 'Email欄位必需填寫',
            'email.email' => 'Email格式錯誤',
            'email.max' => 'Email最長 :max 字',
            'email.unique' => '此Email已註冊',
            'password.required' => '密碼欄位必需填寫',
            'password.min' => '密碼填位不得低於 :min 字',
            'password.confirmed' => '密碼與確認密碼必需一致',
            'check_contract.required' => '必需同意規約、條款、聲明',
            'university.exists' => '學校選擇錯誤請重新選擇',
            'nickname.required' => '暱稱為必填欄位'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'uuid' => 'post-'.uniqid(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'university' => $data['university'],
            'nickname' => $data['nickname']
        ]);
    }

    protected function showRegistrationForm()
    {
        $universities = University::pluck('chinese_name', 'id');
        $Data['universities'] = $universities;
        return view('auth.register', compact(['Data']));
    }
}
