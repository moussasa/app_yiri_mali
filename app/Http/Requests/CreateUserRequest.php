<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'last_name' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'password' => 'min:4'
        ];
    }

    public function messages(){
        return [
         'email.required' => 'Veillez saisir un email.',
         'email.email' => 'Veillez saisir un email valide.',
         'name.required' => 'Veillez saisir un nom.',
         'last_name.required' => 'Veillez saisir un prenom.',
         'telephone.required' => 'Veillez saisir un telephone.',
        //  'telephone.unique' => 'Ce numero est déja enregistré. Utiliser un autre.',
         'adresse.required' => 'Veillez saisir votre adresse.',
         'password.min' => 'Le mot de passe doit contenir au mois 4 carractères.'
        ];
     }
}
