<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    $rules = [
        'name' => 'required|max:20|string|min:3',
        'email' => 'required|email|unique:users,email,' . $this->route('id'),
        'role' => 'required|exists:roles,id',
    ];

    if ($this->route('id')) {
        $rules += [
            'password' => 'nullable|min:6|confirmed',
        ];
    } else {
        $rules += [
            'password' => 'required|min:6|confirmed',
        ];
    }

    return $rules;
    }

}
