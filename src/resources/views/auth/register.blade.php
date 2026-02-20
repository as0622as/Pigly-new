@extends('layouts.auth')

@section('title','会員登録')

@section('content')

<h2 class="form-title">会員登録</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label>お名前</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

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
            次に進む
        </button>
    </form>
</div>

@endsection
