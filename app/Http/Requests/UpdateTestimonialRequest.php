<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
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
            'project_client_id' => ['sometimes', 'integer'],
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'],
            'message' => ['sometimes', 'string', 'max:255']
        ];
    }
}
