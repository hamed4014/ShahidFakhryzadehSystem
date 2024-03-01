<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class attendanceRequest extends FormRequest
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
            'national_code' => 'required|size: 10|string|regex:/^[0-9]{10}$/',
            'date' => 'required|regex:/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/|size: 10|string',
        ];
    }

    public function messages()
    {
        return [
            'national_code.required' => 'کد ملی الزامی می باشد.',
            'national_code.size' => 'کد ملی باید ده رقم باشد.',
            'national_code.regex' => 'کد ملی باید ده رقم باشد.',
            'date.required' => 'تاریخ تولد الزامی می باشد.',
            'date.size' => 'فرمت تاریخ باید به صورت YYYY/MM/DD باشد.',
            'date.regex' => 'فرمت تاریخ باید به صورت YYYY/MM/DD باشد.'
        ];
    }
}
