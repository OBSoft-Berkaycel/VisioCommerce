<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255|unique:products,name',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Define custom error messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not exceed 255 characters.',
            'name.unique' => 'The product name must be unique.',
            'brand.required' => 'The brand name is required.',
            'brand.string' => 'The brand name must be a string.',
            'brand.max' => 'The brand name may not exceed 255 characters.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be a positive number.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image size may not exceed 2 MB.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not exceed 1000 characters.',
        ];
    }
}
