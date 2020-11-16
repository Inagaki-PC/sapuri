<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    
    //ゲストログイン機能を実装
    //attemptメソッドは、最初の引数として、キー／値ペアの配列を受け取る。
    //下記のメールアドレスとパスワードの配列を引数に指定します。
    public function guestLogin()
{
    $email = 'XXXX@yahoo.co.jp';
    $password = 'XXXXXXXX';

    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        //認証を処理する
        return redirect()->route('home');
    }

    return redirect('/');
}
    
}
