<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    /**
     * Autorizar request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        return [
            'ID_No_Seguro' => 'required|integer|unique:pacientes,ID_No_Seguro',
            'Nombre'       => 'required|string|max:255',
            'Apellidos'    => 'required|string|max:255',
            'Edad'         => 'required|integer|min:0|max:120',
            'Telefono'     => 'nullable|string|max:20',
            'Sexo'         => 'required|in:M,F'
        ];
    }
}
