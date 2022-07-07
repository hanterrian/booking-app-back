<?php

namespace App\Http\Requests\Api\v1\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $email
 * @property string $avatar
 * @property string $birthday
 * @property string $password
 * @property string $password_confirmation
 */
class RegisterFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['image', 'size:2048'],
            'birthday' => ['required', 'date_format:"Y-m-d"'],
            'password' => ['required', 'confirmed', 'max:255'],
            'password_confirmation' => ['required', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
