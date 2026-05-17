<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'gender'      => 'required|in:male,female',
            'discount'    => 'nullable|numeric|min:0|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'heading.required'     => 'Product heading is required.',
            'heading.max'          => 'Heading may not exceed 255 characters.',
            'description.required' => 'Product description is required.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists'   => 'Selected category does not exist.',
            'price.required'       => 'Price is required.',
            'price.numeric'        => 'Price must be a valid number.',
            'price.min'            => 'Price must be at least 0.',
            'gender.required'      => 'Please select a target gender.',
            'gender.in'            => 'Gender must be either male or female.',
            'discount.numeric'     => 'Discount must be a valid number.',
            'discount.min'         => 'Discount cannot be negative.',
            'discount.max'         => 'Discount cannot exceed 100%.',
            'image.required'       => 'Product image is required.',
            'image.image'          => 'File must be a valid image.',
            'image.max'            => 'Image size must not exceed 2MB.',
        ];
    }

}