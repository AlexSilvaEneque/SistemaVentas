<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:products,name,' . $this->route('product')->id,
            'sell_price' => 'required',
            'category_id' => 'required|integer',
            'provider_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor ingresado no es válido.',
            'name.unique' => 'El valor ingresado ya está en uso.',
            'name.max' => 'Solo se aceptan 255 caracteres',

            'image.required' => 'Este campo es requerido.',
            'image.dimensions' => 'Solo se permiten imágenes de 100x200 px.',
            
            'sell_price.required' => 'Este campo es requerido.',

            'category_id.required' => 'Este campo es requerido.',
            'category_id.integer' => 'El valor tiene que ser entero.',
            'category_id.exists' => 'La Categoría no existe.',

            'provider_id.required' => 'Este campo es requerido.',
            'provider_id.integer' => 'El valor tiene que ser entero.',
            'provider_id.exists' => 'El Proveedor no existe.',
            
        ];
    }
}
