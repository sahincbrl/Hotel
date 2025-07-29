<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'email' => 'Zehmet olmasa emailinizi qeyd edin!',
            'email.email' => 'E-poçt ünvanını düzgün daxil edin! (xxxxxx@xxxx.xxx)',
            'password' => 'Zehmet olmasa şifrənizi qeyd edin!',
            'password.min' => 'Zehmet olmasa şifrəni minimum 5 simvol daxil edin!',
        ];
    }
}
