<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        switch ($this->route()->getActionMethod()) {
            case 'login':
                return [
                    'email' => 'required|email',
                    'password' => 'required',
                    'device_name' => 'required',
                ];
            case 'register':
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8',
                    'device_name' => 'required',
                ];
            default:
                return [];
        }
    }
}
