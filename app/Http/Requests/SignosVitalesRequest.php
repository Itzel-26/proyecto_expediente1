<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignosVitalesRequest extends FormRequest
{
    /**
     * Permitir el acceso (cambiar a true).
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Reglas de validación para signos vitales.
     */
    public function rules(): array
    {
        return [
            'ID_No_Seguro' => 'required|numeric',
            'Cedula'       => 'required|string|max:20',
            'Presion'      => 'required|string|max:10',
            'Altura'       => 'required|string|max:10',
            'Temperatura'  => 'required|string|max:10',
            'Peso'         => 'required|string|max:10',
        ];
    }

    /**
     * Mensajes personalizados (opcional).
     */
    public function messages(): array
    {
        return [
            'ID_No_Seguro.required' => 'El número de seguro es obligatorio.',
            'Cedula.required'        => 'La cédula es obligatoria.',
            'Presion.required'       => 'La presión arterial es obligatoria.',
        ];
    }
}
