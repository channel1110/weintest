@extends('layouts.app')

@section('content')
<div class="container mt-5">
    
    <h2>회원가입</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="userid" class="form-label">아이디</label>
            <input type="text" class="form-control" id="userid" name="userid" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">패스워드</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">패스워드 확인</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">이름</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="birth" class="form-label">생년월일</label>
            <input type="date" class="form-control" id="birth" name="birth" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
            <select class="form-control" id="email_domain" name="email_domain">
                <option>@naver.com</option>
                <option>@gmail.com</option>
                <option>@hanmail.com</option>
            </select>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="agree1" name="agree1" required>
            <label class="form-check-label" for="agree1">개인(신용)정보의 수집·이용에 관한 사항 (필수) 약관에 동의합니다</label>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="agree2" name="agree2" required>
            <label class="form-check-label" for="agree2">서비스 이용에 관한 사항 (필수) 약관에 동의합니다</label>
        </div>
        <input type="hidden" name="register_status" value="1" id="register_status">
        <input type="hidden" name="register_date" value="{{ $registrationTime }}" id="register_date">
        <button type="submit" class="btn btn-primary">가입하기</button>
    </form>
</div>
@endsection
