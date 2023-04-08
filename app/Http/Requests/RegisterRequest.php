<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|between:2,255',
            'last_name' => 'required|string|between:2,255',
            'email' => 'required|email|between:2,255|unique:users',
            'password' => [
                'required',
                Password::min(8)->numbers()
            ],
            'password_confirmation' => 'required|same:password',
            'image_url' => 'required|string'
        ];
    }
}
