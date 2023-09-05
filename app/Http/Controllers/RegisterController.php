<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        $date = now();
        return view('register',['registrationTime' => now()]);
    }

    use RegistersUsers; // RegistersUsers트레잇 일반적인 회원가입 프로세스를 간편하게 구현

    protected $redirectTo = RouteServiceProvider::HOME;

    //
    public function __construct()
    {
        $this->middleware('guest');
    }

    // 입력 받은 데이터에 대한 유효성 검사
    protected function validator(array $data)
    {   //dd($data);
        
        // 이메일 주소 완성하기
        $data['email'] = $data['email'] . $data['email_domain'];
        
        // Carbon::now()를 통해 현재 시간을 가져오기
        $registrationTime = Carbon::now(); 
    
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'], // 이름 필수 & 문자열 & 최대 255
            'email' => [
                'required', 'string', 'email', 'max:255',                              
                'regex:/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*/'
            ],
            'userid' => [
                'required',
            ],
            'password' => [
                'required', 'string', 'min:8', 'max:15',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*+=-])[a-zA-Z\d!@#$%^&*+=-]+$/',
                'confirmed'
            ],
            'birth' => ['required', 'date'],
            'agree1' => ['required', 'string', 'accepted'],
            'agree2' => ['required', 'string','accepted'],
        ]);
        
    }
    
    // 새로운 User 인스턴스를 생성
    protected function create(array $data)
    {   
        $email = $data['email'].$data['email_domain'];
        
        return User::create([
                
            'name' => $data['name'],
            'email' => $email,
            'userid' => $data['userid'],
            'password' => Hash::make($data['password']),
            'birth' => $data['birth'],
            'agree1' => isset($data['agree1']) && $data['agree1'] === 'on' ? 1 : 0, // 'on' 값을 '1'로 변환
            'agree2' => isset($data['agree2']) && $data['agree2'] === 'on' ? 1 : 0, // 'on' 값을 '1'로 변환
            'register_date' => now(),
            'register_status' => $data['register_status'],
            'deleted_at' => null,
        ]);

    }
    
}
    