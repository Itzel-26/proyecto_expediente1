<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaMedica extends Model
{
    protected $table = 'nota_medica';
    protected $primaryKey = 'ID_Nota';
    public $timestamps = false;

    protected $fillable = [
        'ID_Cita',
        'ID_Diagnostico',
        'ID_Tratamiento',
        'Fecha'
    ];

    // -----------------------------
    //   RELACIONES
    // -----------------------------

    // NotaMedica pertenece a una Cita
    public function cita()
    {
        return $this->belongsTo(Cita::class, 'ID_Cita', 'ID_Cita');
    }

    // NotaMedica pertenece a un Diagnóstico
    public function diagnostico()
    {
        return $this->belongsTo(Diagnostico::class, 'ID_Diagnostico', 'ID_Diagnostico');
    }

    // NotaMedica pertenece a un Tratamiento
    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class, 'ID_Tratamiento', 'ID_Tratamiento');
    }
}
