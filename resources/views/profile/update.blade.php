@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">회원정보 변경 폼</div>

                    <div class="card-body">
                        
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf                          
                            <div class="mb-3">
                                <label for="userid" class="form-label">아이디: {{ $user->userid }}</label>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">이메일: <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                
                            </label>
                            </div>
                            <div class="mb-3">
                                <label for="birth" class="form-label">생년월일: <input type="date" name="birth" class="form-control" value="{{ $user->birth }}"></label>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">변경 비밀번호: <input type="password" name="password" class="form-control"></label>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">변경 비밀번호 확인: <input type="password" name="password_confirmation" class="form-control"></label>
                            </div>
                            <!-- 아이디 변경 불가 -->
                            <input type="hidden" name="userid" value="{{ $user->userid }}">
                            <button type="submit" class="btn btn-primary">정보 변경</button>
                            <a href="{{ route('profile.withdraw') }}" class="btn btn-danger">회원 탈퇴</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection