<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BlogRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        if ($this->isMethod('POST')){
            return [
                'title_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'other_images' => 'required|array',
                'other_images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title_az' => 'required',
                'title_en' => 'required',
                'title_ru' => 'required',
                'description_az' => 'required',
                'description_en' => 'required',
                'description_ru' => 'required',

            ];
        }elseif ($this->isMethod('PUT')){
            return [
                'title_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'other_images' => 'nullable|array',
                'other_images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title_az' => 'required',
                'title_en' => 'required',
                'title_ru' => 'required',
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
            'title_image.required' => 'Zəhmət olmasa Başlıq şəkli seçin',
            'title_image.mimes' => 'Faylın formatı düz deyil! (jpeg, png, jpg, gif, svg. olmalıdır)',
            'title_image.max' => 'Fayl maksimum 2 MB olmalıdır!',
            'other_images.required' => 'Zəhmət olmasa Digər şəkilləri seçin',
            'other_images.*.mimes' => 'Faylın formatı düz deyil! (jpeg, png, jpg, gif, svg. olmalıdır)',
            'other_images.*.max' => 'Fayl maksimum 2 MB olmalıdır!',
            'title_az.required' => 'Başlıq məzburidir!',
            'title_en.required' => 'Başlıq məzburidir!',
            'title_ru.required' => 'Başlıq məcburidir!',
            'description_az.required' => 'Ətraflı məlumat məcburidir!',
            'description_en.required' => 'Ətraflı məlumat məcburidir!',
            'description_ru.required' => 'Ətraflı məlumat məcburidir!',


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
