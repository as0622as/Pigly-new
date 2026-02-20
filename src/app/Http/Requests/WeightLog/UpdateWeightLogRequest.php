<?php

namespace App\Http\Requests\WeightLog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeightLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // 1. 日付
            'date' => ['required', 'date'],

            // 2. 体重
            'weight' => [
                'required',
                'numeric',
                'digits_between:1,4', // 4桁以内
                'regex:/^\d{1,3}(\.\d)?$/', // 小数点1桁まで
            ],

            // 3. 摂取カロリー
            'calorie' => 'required|integer|min:0',


            // 4. 運動時間
            'exercise_time' => 'required|integer|min:0',

            // 5. 運動内容
            'exercise_content' => ['nullable', 'max:120'],
        ];
    }

    public function messages(): array
    {
        return [
            // 日付
            'date.required' => '日付を入力してください',
            'date.date' => '正しい日付を入力してください',

            // 体重
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.digits_between' => '4桁までの数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',

            // 摂取カロリー
            'calorie.required' => '摂取カロリーを入力してください',
            'calorie.numeric' => '数字で入力してください',

            // 運動時間
            'exercise_time.required' => '運動時間を入力してください',

            // 運動内容
            'exercise_content.max' => '120文字以内で入力してください',
        ];
    }
}
