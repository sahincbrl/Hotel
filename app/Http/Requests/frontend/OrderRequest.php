<?php

namespace App\Http\Requests\frontend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
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
                'room_id' => 'required',
                'price' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'check_in' => 'required',
                'check_out' => 'required',
                'adult_count' => 'required',
                'child_count' => 'required',
            ];
        } elseif ($this->isMethod('PUT')) {
            return [
                'room_id' => 'required',
                'price' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'check_in' => 'required',
                'check_out' => 'required',
                'adult_count' => 'required',
                'child_count' => 'required',
            ];
        }
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'room_id.required' => 'Zəhmət olmasa otaq daxil edin',
            'price.required' => 'Zəhmət olmasa qiymət daxil edin',
            'name.required' => 'Zəhmət olmasa ad daxil edin',
            'surname.required' => 'Zəhmət olmasa soyad daxil edin',
            'email.required' => 'Zəhmət olmasa email daxil edin',
            'mobile.required' => 'Zəhmət olmasa nomre daxil edin',
            'check_in.required' => 'Zəhmət olmasa giris vaxti daxil edin',
            'check_out.required' => 'Zəhmət olmasa cixis vaxti daxil edin',
            'adult_count.required' => 'Zəhmət olmasa neçə nəfər olduğunu daxil edin',
            'child_out.required' => 'Zəhmət olmasa neçə uşaq olduğunu daxil edin',
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
