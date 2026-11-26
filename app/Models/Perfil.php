<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'ID_Perfil';
    public $timestamps = false;

    protected $fillable = [
        'ID_Usuario',
        'Usuario',
        'Contraseña'
    ];

    // Relación con Usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'ID_Usuario', 'ID_Usuario');
    }
}
