<?php

namespace App\Http\Controllers;

use App\Http\Requests\InitialWeightRequest;
use App\Models\WeightTarget;
use App\Models\WeightLog;
use Illuminate\Support\Facades\Auth;

class InitialWeightController extends Controller
{
    public function create()
    {
        $user = auth()->user();


        if ($user->weightTarget) {
            return redirect()->route('dashboard');
        }

            return view('initial_weight.create');
    }

    public function store(InitialWeightRequest $request)
    {
        $user = auth()->user();
        $validated = $request->validated();


        $user->weightTarget()->create([
            'target_weight' => $validated['target_weight'],
        ]);


        $user->weightLogs()->create([
            'weight' => $validated['current_weight'],
            'date' => now(),
        ]);

            return redirect()->route('dashboard');
    }
}
