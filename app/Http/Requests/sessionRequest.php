<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|regex:/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/|size: 10|unique:sessions|string'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'تاریخ الزامی می باشد.',
            'date.size' => 'فرمت تاریخ باید به صورت YYYY/MM/DD باشد.',
            'date.regex' => 'فرمت تاریخ باید به صورت YYYY/MM/DD باشد.',
            'date.unique' => 'این تاریخ قبلا ثبت شده است.'
        ];
    }
}
