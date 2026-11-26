<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = 'tratamiento';
    protected $primaryKey = 'ID_Tratamiento';
    public $timestamps = false;

    protected $fillable = [
        'ID_Medicamento',
        'Via_Admin'
    ];

    public function medicamento()
    {
        return $this->belongsTo(CatalogoMedicamentos::class, 'ID_Medicamento', 'ID_Medicamento');
    }

    public function notas()
    {
        return $this->hasMany(NotaMedica::class, 'ID_Tratamiento', 'ID_Tratamiento');
    }
}
