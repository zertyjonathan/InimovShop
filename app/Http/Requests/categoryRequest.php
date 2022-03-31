<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_title' => 'required|max:255',
            'category_description'=>'max:1024',
            'category_fileimg' => 'mimes:jpeg,png,jpg|max:1024',
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
            'category_title.required' => 'Champs requis',
            'category_fileimg.mimes' => 'Les formats d\'images requis sont: jpeg,png,jpg',
            'category_fileimg.max' => 'taille de l\'image requis 1Mo',
        ];
    }


    public function stopOnFirstFailure($stopOnFirstFailure = true)
    {

        $this->stopOnFirstFailure = $stopOnFirstFailure;

        return $this;
    }
}
