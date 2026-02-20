@extends('layouts.app')

@section('content')

<div class="target-wrapper">
    <div class="target-card">

        <h2 class="card-title">目標体重設定</h2>

        <form action="{{ route('target.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>目標体重 (kg)</label>
                <input 
                    type="number"
                    name="target_weight"
                    step="0.1"
                    value="{{ old('target_weight', $target->target_weight ?? '') }}"
                >
            </div>

            <button type="submit" class="btn-gradient">
                更新する
            </button>

        </form>

    </div>
</div>

@endsection
