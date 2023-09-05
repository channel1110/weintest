@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">회원탈퇴 폼</div>
                    <div class="card-body">
                        <form action="{{ route('profile.withdraw') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="confirmWithdraw"> 탈퇴여부 재확인
                                </label>
                            </div>
                            <button type="submit" class="btn btn-danger">탈퇴</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection