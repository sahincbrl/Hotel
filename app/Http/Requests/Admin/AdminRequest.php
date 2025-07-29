<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
        if ($this->isMethod('POST')) {
            return [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'fin' => 'required|unique:users,fin',
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'mobile' => 'required|string|max:255',
                'email' => 'required|unique:users,email',
                'password' => 'required|string',
                're_password' => 'required|string',
            ];
        } elseif ($this->isMethod('PUT')) {
            return [
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'fin' => 'required|unique:users,fin,' . $this->admin->id,
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'mobile' => 'required|string|max:255',
                'email' => 'required|unique:users,email,' . $this->admin->id,
            ];
        }
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'image.required' => 'Zəhmət olmasa Şəkil seçin',
            'image.mimes' => 'Faylın formatı düz deyil! (jpeg, png, jpg, gif, svg. olmalıdır)',
            'fin.required' => 'Zəhmət olmasa Fin daxil edin',
            'fin.unique' => 'Bu fin artıq sistemdə var! Başqa fin daxil edin.',
            'name.required' => 'Zəhmət olmasa Ad daxil edin',
            'surname.required' => 'Zəhmət olmasa Soyad daxil edin',
            'mobile.required' => 'Zəhmət olmasa Telefon daxil edin',
            'email.required' => 'Zəhmət olmasa E-poçt daxil edin',
            'email.unique' => 'Bu E-poçt artıq sistemdə var! Başqa E-poçt daxil edin.',
            'password.required' => 'Zəhmət olmasa Şifrə daxil edin',
            're_password.required' => 'Zəhmət olmasa Təkrar Şifrə daxil edin',
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        $messages = $validator->messages();

        throw new HttpResponseException(response()->json([
            'title' => 'Uğursuz!',
            'status' => 'validation-error',
            'message' => 'Məlumat əlavə olunmadı!',
            'attributes' => $messages->keys(),
            'errors' => $messages->all()
        ], 422));
    }
}
