<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogoMedicamentosRequest extends FormRequest
{
    /**
     * Autorizar la petición.
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
            'Nombre'             => 'required|max:255|min:3',
            'Tipo_presentacion'  => 'required|max:255|min:3',
            'Via_administracion' => 'required|max:255|min:3', // Nuevo campo
        ];
    }
}
