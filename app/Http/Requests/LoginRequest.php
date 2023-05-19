<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'min:4'
        ];
    }

    public function messages(){
       return [
        'email.required' => 'Veillez saisir un email.',
        'email.email' => 'Veillez saisir un email valide.',
        'password.min' => 'Le mot de passe doit contenir au mois 4 carractères.'
       ];
    }
}
