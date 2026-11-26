<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite que cualquier usuario lo use
    }

    public function rules()
    {
        return [
            'cedula'        => 'required|string|max:20',
            'administrador' => 'nullable|string|max:50',
            'enfermera'     => 'nullable|string|max:50',
            'doctor'        => 'nullable|string|max:50',
        ];
    }
}
