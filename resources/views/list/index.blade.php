@extends('layouts.app')

@section('content')
<h1 class="mb-3 text-center">회원 리스트</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <table class="table table-bordered table-hover table-striped member">
                    <thead class="table-success">
                        <tr>
                            <th>이름</th>
                            <th>이메일</th>
                            <th>아이디</th>
                            <th>생년월일</th>
                            <th>가입일</th>
                            <th>회원여부</th>
                        </tr>
                    </thead>
                   
                   @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('profile.update', ['userid' => $user->userid]) }}">{{ $user->userid }}</a></td>
                    
                        <td>{{ $user->birth }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if($user->register_status == 1)
                                가입
                            @else
                                탈퇴
                            @endif
                        </td>
                    </tr>
            @endforeach
                </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item {{ $users->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $users->url(1) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                            <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $users->url($users->lastPage()) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>

                            
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
