<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';

    protected $primaryKey = 'ID_Especialidad';

    protected $fillable = [
        'Tipo_Especialidad'
    ];
}