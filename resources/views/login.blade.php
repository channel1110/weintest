@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">                    
                    <div class="card-header">{{ __('로그인') }}</div>
                    <div class="card-body">
                        
                        {{--  --}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row mt-3">
                                <label for="userid" class="col-md-4 col-form-label text-md-right">{{ __('아이디') }}</label>

                                <div class="col-md-6">
                                    <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}" required autocomplete="user_id" autofocus>

                                    @error('userid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('비밀번호') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('로그인') }}
                                    </button>
                                    <!-- 회원가입 버튼 추가 -->
                                    <a href="{{ route('register') }}" class="btn btn-secondary">
                                        {{ __('회원가입') }}
                                    </a>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection