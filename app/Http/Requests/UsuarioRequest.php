<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Autoriza la petición.
     */
    public function authorize(): bool
    {
        return true; // ← Permitir, la Policy controla accesos reales
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        return [
            'Cedula'        => 'nullable|string|exists:personal,Cedula',
            'Tipo_Usuario'  => 'required|string|max:50',
            'ID_No_Seguro'  => 'nullable|integer|exists:pacientes,ID_No_Seguro',
        ];
    }
}
