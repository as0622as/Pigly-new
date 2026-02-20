@extends('layouts.auth')

@section('title','ログイン')

@section('content')

<h2 class="form-title">ログイン</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-gradient">
            ログイン
        </button>
    </form>
</div>

@endsection
