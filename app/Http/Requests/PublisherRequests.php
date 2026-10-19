<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'publisher_name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'publisher_name.required' => 'The publisher name is required.',
            'publisher_name.string' => 'The publisher name must be a string.',
            'publisher_name.min' => 'The publisher name must be at least 3 characters.',
            'publisher_name.max' => 'The publisher name must not exceed 255 characters.',
        ];
    }
}