<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class testimonailImageRequest extends FormRequest
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
            "name" => "required",
            "description" => "required",
            "photo" => "required"
        ];

    }

    public function messages()
    {
        return [
           "name.required" => 'Fill Name',
           "description.required" => 'Fill Description',
           "photo.required" => 'Fill Photo',
        ];
    }
}
