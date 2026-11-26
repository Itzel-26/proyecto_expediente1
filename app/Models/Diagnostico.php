<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $table = 'diagnostico';
    protected $primaryKey = 'ID_Diagnostico';
    public $timestamps = true;

    protected $fillable = [
        'Doctor',
        'ID_No_Seguro',
        'ID_Signos_Vitales',
        'ID_Medicamento',          // reemplazo de ID_Tratamiento
        'Tratamiento',             // nuevo
        'Observaciones',           
        'Indicaciones',
    ];

    /** Relaciones */

    // Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'ID_No_Seguro', 'ID_No_Seguro');
    }

    // Signos vitales
    public function signosVitales()
    {
        return $this->belongsTo(SignosVitales::class, 'ID_Signos_Vitales', 'ID_Signos_Vitales');
    }

    // Doctor
    public function doctor()
    {
        return $this->belongsTo(Personal::class, 'Doctor', 'Cedula');
    }

    // Medicamento
    public function medicamento()
    {
        return $this->belongsTo(CatalogoMedicamentos::class, 'ID_Medicamento', 'ID_Medicamento');
    }
}
