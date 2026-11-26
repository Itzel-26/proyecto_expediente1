<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosticoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado.
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
            'ID_No_Seguro'       => 'required|exists:pacientes,ID_No_Seguro',
            'ID_Signos_Vitales'  => 'required|exists:signosvitales,ID_Signos_Vitales',
            'Doctor'             => 'required|exists:personal,Cedula',

            // NUEVOS CAMPOS DE LA MIGRACIÓN
            'Tratamiento'             => 'nullable|string|max:500',

            // Relación con catalogo_medicamentos
            'ID_Medicamento'          => 'required|exists:catalogo_medicamentos,ID_Medicamento',

            'Observaciones'           => 'nullable|string|max:500',
            'Indicaciones'            => 'nullable|string|max:500',
        ];
    }
}
