<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', function () {
    return view('welcome');
});

// 로그인
Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);

// 로그아웃
Route::post('/', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');

// 회원가입
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register']);

// 홈
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 유저 리스트
Route::get('/list', [App\Http\Controllers\ListController::class, 'index'])->name('list.index');

// 업데이트
Route::get('/profile/update', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');

Route::post('/profile/update', [App\Http\Controllers\UserController::class, 'processProfileUpdate']);

// 탈퇴
Route::get('/profile/withdraw', [App\Http\Controllers\UserController::class, 'showWithdrawForm'])->name('profile.withdraw');

Route::post('/profile/withdraw', [App\Http\Controllers\UserController::class, 'processWithdraw']);

