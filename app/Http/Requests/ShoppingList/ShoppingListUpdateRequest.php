<?php

namespace App\Http\Requests\ShoppingList;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShoppingListUpdateRequest extends FormRequest
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
            'listId' => 'required|numeric|exists:shopping_lists,id',
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                Rule::unique('shopping_lists')->ignore($this->route('shoppingList')),
            ],
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
            'listId.required' => 'The list ID is required.',
            'listId.numeric' => 'The list ID must be a valid number.',
            'listId.exists' => 'The selected list ID does not exist in our records.',
            'name.required' => 'The name of the shopping list is required.',
            'name.string' => 'The name must be a valid string.',
            'name.min' => 'The name must be at least 5 characters long.',
            'name.max' => 'The name cannot be longer than 255 characters.',
            'name.unique' => 'The name of the shopping list must be unique. This name is already in use.',
        ];
    }
}

