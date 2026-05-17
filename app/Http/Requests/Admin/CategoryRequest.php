<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Allow request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules
     */
    public static function rules(): array
    {
        return [
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public static function validationMessages(): array
    {
         return [
            'heading.required' => 'Category heading is required',
            'description.required' => 'Description is required',
            'image.required' => 'Image is required',
            'image.image' => 'File must be an image',
            'image.mimes' => 'Image must be jpg, jpeg, png, or webp',
        ];
    }


}