@extends('layouts.app')

@section('title', '体重データ編集')

@section('content')

<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}">

<h2 class="page-title">体重データ編集</h2>

<div class="form-container">

    <form method="POST" action="{{ route('weight_logs.update', $weightLog->id) }}">
        @csrf
        @method('PUT')

        <!-- 日付 -->
        <div class="form-group">
            <label>日付</label>
            <input 
                type="date"
                name="date"
                value="{{ old('date', $weightLog->date->format('Y-m-d')) }}"
            >
            @error('date')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 体重 -->
        <div class="form-group">
            <label>体重 (kg)</label>
            <input 
                type="number"
                step="0.1"
                name="weight"
                value="{{ old('weight', $weightLog->weight) }}"
            >
            @error('weight')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 摂取カロリー -->
        <div class="form-group">
            <label>摂取カロリー (kcal)</label>
            <input 
                type="number"
                name="calorie"
                value="{{ old('calorie', $weightLog->calorie) }}"
            >
            @error('calorie')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 運動時間 -->
        <div class="form-group">
            <label>運動時間</label>
            <input
                type="time"
                name="exercise_time"
                value="{{ old('exercise_time', $weightLog->exercise_time) }}"
            >
            @error('exercise_time')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 運動内容 -->
        <div class="form-group">
            <label>運動内容</label>
            <textarea
                name="exercise_content"
                rows="3"
            >{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>

            @error('exercise_content')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="submit-button">更新する</button>
    </form>

    <!-- 削除ボタン -->
    <form method="POST"
        action="{{ route('weight_logs.destroy', $weightLog->id) }}"
        class="delete-form"
        onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')

        <button type="submit" class="delete-button">🗑</button>
    </form>

</div>

@endsection
