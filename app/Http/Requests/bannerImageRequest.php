<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bannerImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "text" => "required",
            "button_text" => "required",
            "photo" => "required"
        ];

    }

    public function messages()
    {
        return [
           "button_text.required" => 'Choose Button Text',
           "text.required" => 'Fill Text',
           "photo.required" => 'Fill Photo',
        ];
    }
}
