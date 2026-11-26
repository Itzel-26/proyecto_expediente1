<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorialRequest extends FormRequest
{
    /**
     * Determinar si el usuario está autorizado.
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
            'ID_Cita'         => 'required|integer',
            'ID_Diagnostico'  => 'required|integer',
            'ID_Tratamiento'  => 'required|integer'
        ];
    }
}
