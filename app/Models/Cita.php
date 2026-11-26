<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Especialidad;



class Cita extends Model
{
    protected $table = 'cita';
    protected $primaryKey = 'ID_Cita';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'Enfermera',
        'ID_Especialidad',
        'ID_No_Seguro',
        'Dia',
        'Hora'
    ];

    public function enfermera()
    {
        return $this->belongsTo(Personal::class, 'Enfermera', 'Cedula');
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'ID_Especialidad');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'ID_No_Seguro');
    }

    public function notasMedicas()
    {
        return $this->hasMany(NotaMedica::class, 'ID_Cita', 'ID_Cita');
    }
}

