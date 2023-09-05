<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class UserController extends Controller
{
    // 수정 
    public function updateProfile(Request $request)
    {
        $user = Auth::user(); 
        return view('profile.update', ['user' => $user]);
    }
    

    public function processProfileUpdate(Request $request)
    {   
        $user = Auth::user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'birth' => 'required|date',
            'password' => 'nullable|confirmed|min:6',
        ]);
        
        $data = [
            'email' => $request->email,
            'birth' => $request->birth,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        Session::flash('success', '수정이 완료되었습니다.');
        return redirect()->route('home');
    }

    // 탈퇴
    public function showWithdrawForm()
    {
        return view('profile.withdraw');
    }

    public function processWithdraw(Request $request)
    {
        $user = Auth::user();

        // 탈퇴 여부 확인
        if (!$request->has('confirmWithdraw')) {
            return redirect()->route('profile.withdraw')->withErrors(['error' => '탈퇴를 확인해주세요.']);
        }

        // 회원 탈퇴 처리
        $user->update([
            'register_status' => 0, // 탈퇴 상태로 변경
            'deleted_at' => now(), // 탈퇴 일시 기록
        ]);

        //Auth::logout(); // 로그아웃 처리

        // 데이터베이스에서 사용자 삭제
        //$user->delete();
        $user->save();

        return redirect()->route('home')->with('success', '회원 탈퇴가 완료되었습니다.');
    }

    public function deleteAccount(Request $request)
    {
        // 로그인된 사용자 확인
        $user = Auth::user();

        // 회원 정보 삭제 전에 확인
        if ($user) {
            // 현재 시간과 회원 가입 일자 간의 차이를 계산
            $daysSinceRegistration = now()->diffInDays($user->register_date);

            // 30일 이상 지난 경우 회원 정보 삭제
            if ($daysSinceRegistration >= 30) {
                $user->delete(); // 회원 정보 삭제
                return redirect()->route('home')->with('success', '회원 정보가 삭제되었습니다.');
            } else {
                return redirect()->back()->with('error', '회원 정보 삭제가 불가능합니다. 30일 이내 회원입니다.');
            }
        }
        return redirect()->back()->with('error', '로그인한 사용자를 찾을 수 없습니다.');
    }    
    
}
