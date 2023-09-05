@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('홈') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('로그인 완료 홈 페이지') }}
                    @auth
                        <div class="mt-3">로그인한 사용자 아이디 : {{Auth::user()->userid}}</div>
                    @endauth
                    <div class="mt-4">
                        <a href="{{route("list.index")}}" class="btn btn-primary">
                            회원리스트 이동
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
