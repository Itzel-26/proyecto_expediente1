<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Enfermera' => 'required|exists:personal,Cedula',
            'ID_Especialidad' => 'required|exists:especialidad,ID_Especialidad',
            'ID_No_Seguro' => 'required|exists:paciente,ID_No_Seguro',
            'Dia' => 'required|date',
            'Hora' => 'required|date_format:H:i', 
        ];
    }
}
