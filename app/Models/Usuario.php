<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $primaryKey = 'ID_Usuario';
    public $incrementing = true; // Asumiendo que es autoincremental
    protected $keyType = 'int';

    protected $fillable = [
        'Cedula',
        'Tipo_Usuario',
        'ID_No_Seguro'
    ];     

   


    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'ID_No_Seguro', 'ID_No_Seguro');
    }
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'Cedula', 'Cedula');
    }

     public function perfil()
    {
        return $this->hasOne(Perfil::class, 'id_Usuario', 'id_Usuario');
    }
}
