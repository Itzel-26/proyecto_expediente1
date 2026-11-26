<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cambia si usas Policies
    }

    public function rules()
    {
        $rules = [
            'Nombre'          => 'required|string|max:100',
            'Apellidos'       => 'required|string|max:150',
            'ID_Especialidad' => 'required|integer',
            'RFC'             => 'required|string|max:20',
            'Telefono'        => 'required|string|max:20',
            'Correo'          => 'required|email|max:100',
            'Sexo'            => 'required|in:M,F',
        ];

        // Para crear → la cédula es obligatoria y única
        if ($this->isMethod('post')) {
            $rules['Cedula'] = 'required|string|max:20|unique:personal,Cedula';
        }

        // Para actualizar → NO validar cédula porque no se edita
        return $rules;
    }
}
