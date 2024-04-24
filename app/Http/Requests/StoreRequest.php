<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'image' => 'required|image|mimes:jpeg,png',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The Counstom Mes Title is required',
            'title.string' => 'The Counstom Mes Title must be a string',
            'title.min' => 'The Counstom Mes Title must be at least 3 characters',
            'title.max' => 'The Counstom Mes Title cannot be more than 255 characters',
            'description.required' => 'The Counstom Mes Description is required',
            'description.string' => 'The Counstom Mes Description must be a string',
            'description.min' => 'The Counstom Mes Description must be at least 3 characters',
            'image.mimes'=>"Image Must be jpeg or png format",
            'image.required'=>"Image is required"
        ];
    }
}
