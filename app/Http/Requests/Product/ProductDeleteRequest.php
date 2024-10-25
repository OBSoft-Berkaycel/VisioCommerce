<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductDeleteRequest extends FormRequest
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
            'productId' => "required|numeric|exists:products,id",
        ];
    }

    /**
     * Define custom error messages.
     */
    public function messages(): array
    {
        return [
            'productId.required' => 'The product ID is required.',
            'productId.numeric' => 'The product ID must be a valid number.',
            'productId.exists' => 'The selected product does not exist.',
        ];
    }
}
