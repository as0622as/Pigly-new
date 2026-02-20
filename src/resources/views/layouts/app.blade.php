<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header class="header">
    <div class="header-inner">
        <div class="logo">
            PiGLy
        </div>

        <div class="header-menu">
            <a href="{{ route('target.edit') }}" class="header-btn">
                目標体重設定
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="header-btn">
                    ログアウト
                </button>
            </form>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

</body>
</html>
