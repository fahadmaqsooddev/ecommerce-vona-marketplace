<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public static function rules(): array
    {
        return [
            'heading'     => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ];
    }


   public static function validationMessages(): array
    {
        return [
            'heading.required'     => 'The heading field is required.',
            'description.required' => 'The description field is required.',
            'image.image'          => 'The uploaded file must be a valid image.',
            'image.max'            => 'The image size must not exceed 2MB.',
        ];
    }

}