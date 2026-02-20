@extends('layouts.app')

@section('content')

<div class="form-wrapper">
    <div class="form-card">

        <h2 class="card-title">Weight Log追加</h2>

        <form action="{{ route('weight_logs.store') }}" method="POST">
            @csrf

            {{-- 日付 --}}
            <div class="form-group">
                <label>日付 <span class="required">【必須】</span></label>
                <input type="date" name="date" value="{{ old('date') }}">
                @error('date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- 体重 --}}
            <div class="form-group">
                <label>体重 <span class="required">【必須】</span></label>
                <div class="input-with-unit">
                    <input type="number" step="0.1" name="weight" value="{{ old('weight') }}">
                    <span>kg</span>
                </div>
                @error('weight')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- 摂取カロリー --}}
            <div class="form-group">
                <label>摂取カロリー <span class="required">【必須】</span></label>
                <div class="input-with-unit">
                    <input type="number" name="calorie" value="{{ old('calorie') }}">
                    <span>cal</span>
                </div>
                @error('calorie')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- 運動時間 --}}
            <div class="form-group">
                <label>運動時間 <span class="required">【必須】</span></label>
                <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
                @error('exercise_time')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- 運動内容 --}}
            <div class="form-group">
                <label>運動内容</label>
                <textarea name="exercise_content" rows="3">{{ old('exercise_content') }}</textarea>
                @error('exercise_content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-gradient">
                登録する
            </button>

        </form>

    </div>
</div>

@endsection
