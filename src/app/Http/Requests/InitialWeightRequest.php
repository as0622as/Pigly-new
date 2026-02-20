<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InitialWeightRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_weight' => [
                'required',
                'numeric',
                'regex:/^\d{1,3}(\.\d{1})?$/'
            ],
            'target_weight' => [
                'required',
                'numeric',
                'regex:/^\d{1,3}(\.\d{1})?$/'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'current_weight.required' => '体重を入力してください',
            'current_weight.numeric' => '数字で入力してください',
            'current_weight.regex'   => '4桁までの数字で入力してください（小数点は1桁まで）',
            'target_weight.required' => '体重を入力してください',
            'target_weight.numeric' => '数字で入力してください',
            'target_weight.regex'   => '4桁までの数字で入力してください（小数点は1桁まで）',
        ];
    }
}
