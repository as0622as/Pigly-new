<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use App\Http\Requests\WeightLog\StoreWeightLogRequest;
use App\Http\Requests\WeightLog\UpdateWeightLogRequest;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if (!WeightTarget::where('user_id', $user->id)->exists()) {
            return view('weight_logs.Initial');
        }

        $query = WeightLog::where('user_id', $user->id);

        if ($request->filled(['from', 'to'])) {
            $query->whereBetween('date', [$request->from, $request->to]);
        }

        $logs = $query->orderBy('date', 'desc')->paginate(8);

        $latestWeight = WeightLog::where('user_id', $user->id)
            ->latest('date')
            ->value('weight');

        $targetWeight = WeightTarget::where('user_id', $user->id)
            ->value('target_weight');

        return view('weight_logs.index', compact('logs', 'latestWeight', 'targetWeight'));
    }

    public function create()
    {
        return view('weight_logs.create');
    }

    public function store(StoreWeightLogRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['exercise_time'])) {

            if (str_contains($data['exercise_time'], ':')) {
                [$hour, $minute] = explode(':', $data['exercise_time']);
                $data['exercise_time'] = ((int)$hour * 60) + (int)$minute;
        }
        }

        WeightLog::create([
            ...$data,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', '登録しました');
    }


    public function edit(WeightLog $weightLog)
    {

        if (!empty($weightLog->exercise_time)) {
            $minutes = $weightLog->exercise_time;
            $weightLog->exercise_time = sprintf('%02d:%02d', floor($minutes / 60), $minutes % 60);
        }

        return view('weight_logs.edit', compact('weightLog'));
    }


    public function update(UpdateWeightLogRequest $request, WeightLog $weightLog)
    {
        $data = $request->validated();


        $weightLog->update($data);

        return redirect()->route('dashboard')->with('success', '体重データを更新しました！');
    }


    public function destroy(WeightLog $weightLog)
    {
        $weightLog->delete();

        return redirect()->route('dashboard')->with('success', '体重データを削除しました！');
    }
}
