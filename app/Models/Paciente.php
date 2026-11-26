<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';   // ❗ Cambiado a plural

    protected $primaryKey = 'ID_No_Seguro';
    public $incrementing = false; // ❗ Añadido para clave primaria no autoincremental
    protected $keyType = 'string'; // ❗ Añadido para clave primaria de tipo string

    protected $fillable = [
        'ID_No_Seguro',
        'Nombre',
        'Apellidos',
        'Edad',
        'Telefono',
        'Sexo'
    ];
}
