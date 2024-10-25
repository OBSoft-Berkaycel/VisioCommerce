<?php

namespace App\Http\Requests\ShoppingList;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingListCreateRequest extends FormRequest
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
            "userId" => "required|numeric|exists:users,id",
            "name" => "required|string|min:5|max:255"
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
            'userId.required' => 'The user ID is required.',
            'userId.numeric' => 'The user ID must be a valid number.',
            'userId.exists' => 'The selected user ID does not exist in our records.',
            'name.required' => 'The name of the shopping list is required.',
            'name.string' => 'The name must be a valid string.',
            'name.min' => 'The name must be at least 5 characters long.',
            'name.max' => 'The name cannot be longer than 255 characters.',
        ];
    }
}
