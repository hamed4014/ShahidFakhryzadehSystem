<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerUserRequest extends FormRequest
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
            'fname' => 'required|between:3,50|string',
            'lname' => 'required|between:3,50|string',
            'birthday' => 'required|regex:/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/|size: 10|string',
            'case_status' => 'between:0,100|string',
            'group' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'national_code.required' => 'کد ملی الزامی می باشد.',
            'national_code.size' => 'کد ملی باید ده رقم باشد.',
            'national_code.regex' => 'کد ملی باید ده رقم باشد.',
            'fname.required' => 'نام الزامی می باشد.',
            'fname.between' => 'نام باید بین 3 تا 50 حرف باشد.',
            'birthday.required' => 'تاریخ تولد الزامی می باشد.',
            'birthday.size' => 'فرمت تاریخ باید به صورت YYYY/MM/DD باشد.',
            'birthday.regex' => 'فرمت تاریخ باید به صورت YYYY/MM/DD باشد.',
            'case_status.between' => 'توضیحات نمی تواند بیشتر از 100 حرف باشد.',
            'group.required' => 'حلقه صالحین را انتخاب کنید.'
        ];
    }
}
