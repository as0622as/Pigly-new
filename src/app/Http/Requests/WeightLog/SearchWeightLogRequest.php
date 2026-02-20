<?php

namespace App\Http\Requests\WeightLog;

use Illuminate\Foundation\Http\FormRequest;

class SearchWeightLogRequest extends FormRequest
{
    /**
     * 認可
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     */
    public function rules(): array
    {
        return [
            'start_date' => [
                'nullable',
                'date',
            ],
            'end_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date',
            ],
        ];
    }

    /**
     * エラーメッセージ
     */
    public function messages(): array
    {
        return [
            'start_date.date'              => '正しい日付を入力してください',
            'end_date.date'                => '正しい日付を入力してください',
            'end_date.after_or_equal'      => '終了日は開始日以降の日付を入力してください',
        ];
    }
}
