<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeroSectionRequest extends FormRequest
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
            'achievement' => ['sometimes', 'string', 'max:255'],
            'heading' => ['sometimes', 'string', 'max:255'],
            'subheading' => ['sometimes', 'string', 'max:255'],
            'path_video' => ['sometimes', 'string', 'max:255'],
            'banner' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg']
        ];
    }
}
