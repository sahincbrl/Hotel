<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RoomRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
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
                'pricing_description_az' => 'required',
                'pricing_description_en' => 'required',
                'pricing_description_ru' => 'required',
                'nightly_price' => 'required',
                'monthly_price' => 'required',
                'weekly_price' => 'required',
                'weekend_price' => 'required',
                'additional_price' => 'required',
                'security_deposit_price' => 'required',
                'bed_count' => 'required|numeric',
                'bath_count' => 'required|numeric',
                'wifi' => 'required',
                'tv' => 'required',
                'ac' => 'required',
                'laundry' => 'required',
                'dinner' => 'required',
                'category_id' => 'required'
            ];
        } elseif ($this->isMethod('PUT')) {
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
                'pricing_description_az' => 'required',
                'pricing_description_en' => 'required',
                'pricing_description_ru' => 'required',
                'nightly_price' => 'required|numeric',
                'monthly_price' => 'required|numeric',
                'weekly_price' => 'required|numeric',
                'weekend_price' => 'required|numeric',
                'additional_price' => 'required|numeric',
                'security_deposit_price' => 'required|numeric',
                'bed_count' => 'required|numeric',
                'bath_count' => 'required|numeric',
                'wifi' => 'required',
                'tv' => 'required',
                'ac' => 'required',
                'laundry' => 'required',
                'dinner' => 'required',
                'category_id' => 'required'
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
            'pricing_description_az.required' => 'Qiymət barədə məlumat məcburidir!',
            'pricing_description_en.required' => 'Qiymət barədə məlumat məcburidir!',
            'pricing_description_ru.required' => 'Qiymət barədə məlumat məcburidir!',
            'nightly_price.required' => 'Qiymət məcburidir!',
            'nightly_price.numeric' => 'Qiymət rəqəmlə olmalıdır!',
            'monthly_price.required' => 'Qiymət məcburidir!',
            'monthly_price.numeric' => 'Qiymət rəqəmlə olmalıdır!',
            'weekly_price.required' => 'Qiymət məcburidir!',
            'weekly_price.numeric' => 'Qiymət rəqəmlə olmalıdır!',
            'weekend_price.required' => 'Qiymət məcburidir!',
            'weekend_price.numeric' => 'Qiymət rəqəmlə olmalıdır!',
            'additional_price.required' => 'Qiymət məcburidir!',
            'additional_price.numeric' => 'Qiymət rəqəmlə olmalıdır!',
            'security_deposit_price.required' => 'Qiymət məcburidir!',
            'security_deposit_price.numeric' => 'Qiymət rəqəmlə olmalıdır!',
            'bed_count.required' => 'Yataq sayı məcburidir',
            'bed_count.numeric' => 'Yataq sayı rəqəmlə olmalıdır',
            'bath_count.required' => 'Hamam sayı məcburidir',
            'bath_count.numeric' => 'Hamam sayı məcburidir',
            'wifi.required' => 'WiFi məcburidir',
            'tv.required' => 'Tv məcburidir',
            'ac.required' => 'Kondisoner məcburidir',
            'laundry.required' => 'Xidmət məcburidir',
            'dinner.required' => 'Nahar məcburidir',
            'category_id.required' => 'Kateqoriya məcburidir',
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
