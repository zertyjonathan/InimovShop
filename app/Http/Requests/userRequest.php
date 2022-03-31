<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'nom' => 'required|alpha_num|max:20',
           'prenom' => 'required|alpha_num|max:20',
           'email'=>'required|email:rfc|unique:users,email',
           'password' => 'required|alpha_num|between:8,15',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nom.required' => 'Champs requis',
            'prenom.required' => 'Champs requis',
           
            'email.required' => 'Champs requis',
            'password.required' => 'Champs requis',
            'nom.alpha_num' => 'Saisir des caractères aplha-numéric',
            'prenom.alpha_num' => 'Saisir des caractères aplha-numéric',
            'password.alpha_num' => 'Saisir des caractères aplha-numéric',

            'nom.max' => 'Saisir au maximun 20 caractères',
            'prenom.max' => 'Saisir au maximun 20 caractères',
            'password.between' => 'Saisir au maximun 15 et au minimun 8 caractères',

            'product_name.max' => 'Saisir au maximun 255 caractères',
            'product_name.max' => 'Les formats d\'images requis sont: jpeg,png,jpg',

            'email.email' => 'Email invalide',
            'email.unique' => 'Cet email existe déjà',
        ];
    }


     public function stopOnFirstFailure($stopOnFirstFailure = true)
    {

        $this->stopOnFirstFailure = $stopOnFirstFailure;

        return $this;
    }
}
