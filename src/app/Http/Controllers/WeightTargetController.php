<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateWeightTargetRequest;
use App\Models\WeightTarget; 

class WeightTargetController extends Controller
{
    public function edit()
    {
        $target = WeightTarget::where('user_id', auth()->id())->first();
        return view('weight_target.edit', compact('target'));
    }

    public function update(UpdateWeightTargetRequest $request)
    {
        WeightTarget::updateOrCreate(
            ['user_id' => auth()->id()],
            ['target_weight' => $request->target_weight]
        );

        return redirect()->route('weight_logs.index');
    }
}
