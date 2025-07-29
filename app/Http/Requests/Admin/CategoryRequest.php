<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'name_az' => 'required',
                'name_en' => 'required',
                'name_ru' => 'required',
            ];
        } elseif ($this->isMethod('PUT')) {
            return [
                'name_az' => 'required',
                'name_en' => 'required',
                'name_ru' => 'required',
            ];
        }
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name_az.required' => 'Zəhmət olmasa ad (Az) daxil edin',
            'name_en.required' => 'Zəhmət olmasa ad (En) daxil edin',
            'name_ru.required' => 'Zəhmət olmasa ad (Ru) daxil edin'
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
