<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoMedicamentos extends Model
{
    protected $table = 'catalogo_medicamentos';
    protected $primaryKey = 'ID_Medicamento';

    protected $fillable = [
        'Nombre',
        'Tipo_presentacion',
        'Via_administracion', // Nuevo campo agregado
    ];
}
