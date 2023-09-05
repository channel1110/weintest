<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
    
</head>
    <div class="fixed top-0 right-0 px-6 py-4">
        @if (Route::has('login'))
            <div><a href={{url('/')}}>Laravel</a></div>
            <div class="flex space-x-4 inline">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">홈</a>
                    @csrf
                    <form action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                        <button type="submit" class="text-sm text-gray-700 dark:text-gray-500 underline ">로그아웃</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">로그인</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">회원가입</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



