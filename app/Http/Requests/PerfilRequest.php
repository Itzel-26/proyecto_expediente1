<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ya lo controlas con la Policy
    }

    public function rules()
    {
        return [
            'ID_Usuario' => 'required|integer',
            'Usuario'    => 'required|string|max:255',
            'Contraseña' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'ID_Usuario.required' => 'Debe seleccionar un usuario.',
            'Usuario.required'    => 'El campo usuario es obligatorio.',
            'Contraseña.required' => 'Debe escribir una contraseña.',
        ];
    }
}
