<?php

namespace App\Http\Requests\ShoppingList;

use Illuminate\Foundation\Http\FormRequest;

class RemoveListItemRequest extends FormRequest
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
            "listId" => "required|numeric|exists:shopping_lists,id",
            "productId" => "required|numeric|exists:products,id"
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'listId.required' => 'The shopping list ID is required.',
            'listId.numeric' => 'The shopping list ID must be a valid number.',
            'listId.exists' => 'The selected shopping list ID does not exist in our records.',
            'productId.required' => 'The product ID is required.',
            'productId.numeric' => 'The product ID must be a valid number.',
            'productId.exists' => 'The selected product ID does not exist in our records.',
        ];
    }
}
