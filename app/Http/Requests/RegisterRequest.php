<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|between:2,255',
            'last_name' => 'required|string|between:2,255',
            'email' => 'required|email|between:2,255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image_url' => 'required|string',
            'terms' => 'required'
        ];
    }
}