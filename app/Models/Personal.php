<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $primaryKey = 'Cedula';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'Cedula',
        'Nombre',
        'Apellidos',
        'ID_Especialidad',
        'RFC',
        'Telefono',
        'Correo',
        'Sexo'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'ID_Especialidad', 'ID_Especialidad');
    }
    public function getRouteKeyName()
    {
        return 'Cedula';
    }
}
