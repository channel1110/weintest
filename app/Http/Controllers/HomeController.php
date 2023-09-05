<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{   
    //    
    public function __construct()
    {   // home <- 페이지를 로그인 한 사람만 접속할 수 있게
        $this->middleware('auth');
    }
    
    // index 메서드 호출시 home으로 이동
    public function index()
    {
        return view('home');
    }
}
