<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignosVitales extends Model
{
    protected $table = 'signosvitales';
    protected $primaryKey = 'ID_Signos_Vitales'; 
    public $incrementing = true;                
    protected $keyType = 'int';                 
    public $timestamps = false;

    protected $fillable = [
        'ID_No_Seguro',
        'Cedula',
        'Presion',
        'Altura',
        'Temperatura',
        'Peso'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'ID_No_Seguro');
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'Cedula');
    }
}

