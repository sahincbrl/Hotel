<?php

namespace App\Http\Requests\frontend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RoomCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'room_id' => 'required',
            'parent_id' => 'nullable',
            'full_name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'rating' => 'nullable',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Zəhmət olmasa tam ad daxil edin',
            'email.required' => 'Zəhmət olmasa email daxil edin',
            'comment.required' => 'Zəhmət olmasa rəy daxil edin',
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
