@extends('layouts.auth')

@section('title','初期体重登録')

@section('content')

<h2 class="form-title">初期体重登録</h2>

    <form method="POST" action="{{ route('initial-weight.store') }}">
        @csrf

        <div class="form-group">
            <label>現在の体重</label>
            <input type="number" step="0.1" name="current_weight" value="{{ old('current_weight') }}">
            @error('current_weight')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>目標の体重</label>
            <input type="number" step="0.1" name="target_weight" value="{{ old('target_weight') }}">
            @error('target_weight')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-gradient">
            登録する
        </button>
    </form>
</div>

@endsection
