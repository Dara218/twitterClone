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
            'name' => 'required|min:4|max:50',
            'username' => 'required|min:4|max:25',
            'password' => [
                'required',
                'min:8',              // minimum length of 8 characters
                'max:255',            // maximum length of 255 characters
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain at least one special character
            ],
            'email' => 'required|email',
            'day' => 'required',
            'year' => 'required',
            'month' => 'required',
        ];
    }
}
