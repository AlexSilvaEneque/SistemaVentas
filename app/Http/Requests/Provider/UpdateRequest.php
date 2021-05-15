<?php

namespace App\Http\Requests\Provider;

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
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:providres,email,' . $this->route('provider')->id,
            'ruc_number' => 'required|string|max:11|min:11|unique:providers,ruc_number,' . $this->route('provider')->id,
            'address' => 'nullable|string',
            'phone' => 'required|string|max:9|min:9|unique:providers,phone,' . $this->route('provider')->id
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Este campo es obligatorio.',
            'name.string' => 'El valor ingresado no es correcto.',
            'name.max' => 'Solo se permiten 100 caracteres.',

            'email.required' => 'Este campo es obligatorio.',
            'email.email' => 'Debe ingresar una dirección de correo electrónico válido.',
            'email.email' => 'El email proporcionado ya está en uso.',

            'ruc_number.required' => 'Este campo es obligatorio.',
            'ruc_number.string' => 'El valor ingresado no es correcto.',
            'ruc_number.unique' => 'El valor ingresado ya está en uso.',
            'ruc_number.max' => 'Solo se acepta un máximo de 9 caracteres.',
            'ruc_number.min' => 'Se requiere de 9 carracteres.',

            'address.string' => 'El valor ingresado no es correcto.',
            'ruc_numbe.max' => 'Solo se permiten 11 caracteres.',
            'ruc_number.min' => 'Se requiere de 11 caracteres.',

            'phone.required' => 'Este campo es oblgatorio.',
            'phone.unique' => 'El valor ingresado ya está en uso.'
        ];
    }
}

// 'dni' => 'required|unique:pacientes,dni,'.$this->route('paciente')->id,