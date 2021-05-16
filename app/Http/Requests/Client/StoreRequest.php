<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'dni' => 'required|max:8|min:8|unique:clients,dni',
            'ruc' => 'max:11|min:11|unique:clients,ruc',
            'address' => 'string|max:255',
            'phone' => 'string|max:9|min:9|unique:clients,phone',
            'email' => 'string|email:rfc,dns|unique:clients,email'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Este campo es obligatorio.',
            'name.string' => 'El valor ingresado no es válido.',

            'dni.required' => 'Este campo es obligatorio.',
            'dni.max' => 'Solo se aceptan 8 caracteres.',
            'dni.min' => 'Se necesitan 8 caracteres.',
            'dni.unique' => 'El número de DNI ingresado ya se encuentra en uso.',
            
            'ruc.unique' => 'El número de RUC ingresado, ya está en uso.',
            'ruc.min' => 'Se necesitan 11 caracteres.',
            'ruc.max' => 'Solo se aceptan 11 caracteres.',

            'address.string' => 'El valor ingresado no es válido.',
            'address.max' => 'Solo se aceptan 255 caracteres.',

            'phone.string' => 'El valor ingresado no es válido.',
            'phone.max' => 'Se necesitan 9 caracteres.',
            'phone.min' => 'Solo se aceptan 9 caracteres.',
            'phone.unique' => 'El número de teléfono ingresado, ya está en uso.',

            'email.string' => 'El valor ingresado no es válido.',
            'email.email' => 'Ingrese una dirección de correo electrónico correcta.',
            'email.unique' => 'El correo electrónico ingresado, ya se encuentra en uso.'
        ];        
    }
}
