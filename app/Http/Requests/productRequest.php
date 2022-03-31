<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'product_name' => 'required|max:255',
            'product_price' => 'required',
            'categorie_id' => 'required',
            'product_stock' => 'required',
            'product_fileimg' => 'mimes:jpeg,png|max:1024',
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
            'product_name.required' => 'Champs requis',
            'product_price.required' => 'Champs requis',
            'category.required' => 'Champs requis',
            'product_stock.required' => 'Champs requis',
            'product_name.max' => 'Saisir au maximun 255 caractères',
            'product_fileimg.mimes' => 'Les formats d\'images requis sont: jpeg,png,jpg',
            'product_fileimg.max' => 'taille de l\'image requis 1Mo',
        ];
    }

    public function stopOnFirstFailure($stopOnFirstFailure = true)
    {
        $this->stopOnFirstFailure = $stopOnFirstFailure;
        return $this;
    }
}
