<?php

namespace App\Http\Requests\frontend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactUsRequest extends FormRequest
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
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ];
        } elseif ($this->isMethod('PUT')) {
            return [
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ];
        }
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Zəhmət olmasa ad daxil edin',
            'email.required' => 'Zəhmət olmasa email daxil edin',
            'subject.required' => 'Zəhmət olmasa movzu daxil edin',
            'message.required' => 'Zəhmət olmasa  daxil edin',
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
