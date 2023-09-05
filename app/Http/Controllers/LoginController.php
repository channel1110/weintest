<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    // 사용자 인증 관련 기능을 컨트롤러에 쉽게 추가할 수 있도록 도와주는 명령어
    use AuthenticatesUsers; 
    
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function __construct()
    {   
        $this->middleware('guest')->except('logout');
    }
    
    // 로그인 시 아이디 필드를 userid로 사용
    public function username()
    {
        return 'userid';
    }

    // 로그인 처리 attempt
    protected function attemptLogin(Request $request)
    {  
        $credentials = $this->credentials($request);
        
        //attempt = 로그인 DB처리
        if ($this->guard()->attempt($credentials, $request->filled('remember'))) { 
            
            $user = Auth::user();
            
            if ($user->isWithinGracePeriod()) {
                $this->guard()->logout();
                return false;
            }
            return true; 
        }
        return false;
    }
 }


   

