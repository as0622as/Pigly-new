<?php

namespace App\Http\Requests\WeightLog;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => ['required', 'date'],
            'weight' => [
                'required',
                'numeric',
                'digits_between:1,4',
                'regex:/^\d{1,3}(\.\d)?$/',
            ],

            'calorie' => ['required', 'integer', 'min:0'],

            'exercise_time' => ['required', 'date_format:H:i'],

            'exercise_content' => ['nullable', 'max:120'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date' => '正しい日付を入力してください',
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.digits_between' => '4桁までの数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',
            'calorie.required' => '摂取カロリーを入力してください',
            'calorie.integer' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_content.max' => '120文字以内で入力してください',
            'exercise_time.date_format' => '正しい時間形式で入力してください',
        ];
    }
}
