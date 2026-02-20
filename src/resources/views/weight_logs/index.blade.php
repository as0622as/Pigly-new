@extends('layouts.app')

@section('title', '体重管理画面')

@section('content')

<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}">

<div class="dashboard-wrapper">

    <!-- ===== ステータスカード ===== -->
    <div class="dashboard-card status-card">
        <div class="status-item">
            <span class="label">目標体重</span>
            <span class="value">{{ number_format($targetWeight,1) }}kg</span>
        </div>

        <div class="status-item">
            <span class="label">目標体重まで</span>
            <span class="value">
                {{ number_format($latestWeight - $targetWeight,1) }}kg
            </span>
        </div>

        <div class="status-item">
            <span class="label">最新体重</span>
            <span class="value">{{ number_format($latestWeight,1) }}kg</span>
        </div>
    </div>


    <!-- ===== 一覧カード ===== -->
    <div class="dashboard-card list-card">

        <!-- 検索＋追加 -->
        <div class="list-header">
            <form method="GET" action="{{ route('dashboard') }}" class="search-form">
                <input type="date" name="from" value="{{ request('from') }}">
                <span>〜</span>
                <input type="date" name="to" value="{{ request('to') }}">
                <button type="submit" class="btn-main">検索</button>
            </form>

            <a href="#createModal" class="open-button">データ追加</a>
        </div>

        <!-- テーブル -->
        <table class="weight-table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse($logs as $log)
                    <tr>
                        <td>{{ $log->date->format('Y/m/d') }}</td>
                        <td>{{ number_format($log->weight,1) }}kg</td>
                        <td>{{ $log->calorie }}kcal</td>
                        <td>
                            @php
                                $hour = floor($log->exercise_time / 60);
                                $minute = $log->exercise_time % 60;
                            @endphp

                            {{ sprintf('%02d:%02d', $hour, $minute) }}
                        </td>

                        <td>
                            <a href="{{ route('weight_logs.edit', $log->id) }}" class="edit-button">
                                🖋
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">データがありません</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $logs->links() }}
        </div>
        <!-- ===== モーダル ===== -->
    <div id="createModal" class="modal">
        <div class="modal-content">

            <a href="#" class="close-button">×</a>

            <h2>データ追加</h2>

            <form method="POST" action="{{ route('weight_logs.store') }}">
                @csrf

                <div class="form-group">
                    <label>日付</label>
                    <input type="date" name="date" required>
                </div>

                <div class="form-group">
                    <label>体重 (kg)</label>
                    <input type="number" step="0.1" name="weight" required>
                </div>

                <div class="form-group">
                    <label>摂取カロリー (kcal)</label>
                    <input type="number" name="calorie" required>
                </div>

                <div class="form-group">
                    <label>運動時間 (分)</label>
                    <input type="time" step="60" name="exercise_time" required>
                </div>

                <div class="form-group">
                    <label>運動内容</label>
                    <input type="text" name="exercise_content">
                </div>

                <button type="submit" class="submit-button">保存</button>
            </form>

        </div>
    </div>

    </div>

</div>

@endsection
