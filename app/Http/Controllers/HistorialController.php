<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;
use Gate;

class HistorialController extends Controller
{
    public function index(Request $request)
    {
        // Si usas policies y quieres controlar acceso, descomenta:
        // Gate::authorize('viewAny', Diagnostico::class);

        $buscar = $request->input('buscar');

        $diagnosticos = Diagnostico::with([
            'paciente',
            'doctor',
            'signosVitales',
            'medicamento'
        ])
        ->when($buscar, function ($query) use ($buscar) {
            $query->where(function ($q) use ($buscar) {

                // Buscar dentro de la relación paciente (nombre/apellidos)
                $q->whereHas('paciente', function ($qp) use ($buscar) {
                    $qp->where('Nombre', 'LIKE', "%{$buscar}%")
                       ->orWhere('Apellidos', 'LIKE', "%{$buscar}%");
                });

                // Buscar por campos del propio diagnóstico (Observaciones, Indicaciones, Doctor)
                $q->orWhere('Observaciones', 'LIKE', "%{$buscar}%")
                  ->orWhere('Indicaciones', 'LIKE', "%{$buscar}%")
                  ->orWhere('Doctor', 'LIKE', "%{$buscar}%"); // si buscas por cédula u texto del doctor

                // Buscar por nombre del medicamento relacionado
                $q->orWhereHas('medicamento', function ($qm) use ($buscar) {
                    $qm->where('Nombre', 'LIKE', "%{$buscar}%");
                });

            });
        })
        ->orderBy('created_at', 'desc') // o cambia por la columna que uses (timestamps true en Diagnostico)
        ->paginate(15)
        ->appends(['buscar' => $buscar]); // mantiene el query en la paginación

        return view('historial.index', compact('diagnosticos', 'buscar'));
    }
}
