<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SlideshowRequest extends FormRequest
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
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title_az' => 'required',
                'title_en' => 'required',
                'title_ru' => 'required',
                'short_info_az' => 'required',
                'short_info_en' => 'required',
                'short_info_ru' => 'required',
                'description_az' => 'required',
                'description_en' => 'required',
                'description_ru' => 'required',

            ];
        } elseif ($this->isMethod('PUT')) {
            return [
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title_az' => 'required',
                'title_en' => 'required',
                'title_ru' => 'required',
                'short_info_az' => 'required',
                'short_info_en' => 'required',
                'short_info_ru' => 'required',
                'description_az' => 'required',
                'description_en' => 'required',
                'description_ru' => 'required',
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
            'image.mimes' => 'Faylın formatı bunlar olmalıdır: jpeg, png, jpg, gif, svg',
            'image.max' => 'Faylın ölçüsü maksimum 2 MB olmalıdır',
            'title_az.required' => 'Zəhmət olmasa melumat daxil edin',
            'title_en.required' => 'Zəhmət olmasa melumat daxil edin',
            'title_ru.required' => 'Zəhmət olmasa melumat daxil edin',
            'short_info_az.required' => 'Zəhmət olmasa melumat daxil edin',
            'short_info_en.required' => 'Zəhmət olmasa melumat daxil edin',
            'short_info_ru.required' => 'Zəhmət olmasa melumat daxil edin',
            'description_az.required' => 'Zəhmət olmasa melumat daxil edin',
            'description_en.required' => 'Zəhmət olmasa melumat daxil edin',
            'description_ru.required' => 'Zəhmət olmasa melumat daxil edin',

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
