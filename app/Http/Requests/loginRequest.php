<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'username' => 'required|between:10,11|string',
            'password' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'نام کاربری الزامی است.',
            'password.required' => 'رمز عبور الزامی است.',
            'username.between' => 'نام کاربری کد ملی شما می باشد.'
        ];
    }


}
