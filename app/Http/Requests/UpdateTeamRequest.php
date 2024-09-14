<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:255'],
            'occupation' => ['sometimes', 'string', 'max:255'],
            'avatar' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'],
            'location' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
