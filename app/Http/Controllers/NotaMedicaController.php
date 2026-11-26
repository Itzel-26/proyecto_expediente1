<?php

namespace App\Http\Controllers;

use App\Models\NotaMedica;
use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Gate;

class NotaMedicaController extends Controller
{
    // LISTADO
public function index(Request $request)
{
    Gate::authorize('viewAny', NotaMedica::class);

    $buscar = $request->input('buscar');

    $notas = NotaMedica::with([
        'cita.paciente',
        'diagnostico.paciente',
        'diagnostico.signosVitales',
        'diagnostico.medicamento',
        'diagnostico.doctor',
        'tratamiento.medicamento'
    ])
    ->when($buscar, function ($query) use ($buscar) {

        $query->where(function ($q) use ($buscar) {

            // ✔ BUSCAR POR PACIENTE EN LA CITA
            $q->whereHas('cita.paciente', function ($q2) use ($buscar) {
                $q2->where('Nombre', 'LIKE', "%{$buscar}%")
                    ->orWhere('Apellidos', 'LIKE', "%{$buscar}%");
            });

            // ✔ BUSCAR POR PACIENTE EN EL DIAGNÓSTICO
            $q->orWhereHas('diagnostico.paciente', function ($q3) use ($buscar) {
                $q3->where('Nombre', 'LIKE', "%{$buscar}%")
                    ->orWhere('Apellidos', 'LIKE', "%{$buscar}%");
            });

        });

    })
    ->get();

    return view('notamedica.index', compact('notas'));
}



    // FORMULARIO CREAR
    public function create()
    {
        $citas = Cita::all();
        $diagnosticos = Diagnostico::all();
        $tratamientos = Tratamiento::all();

        return view('notamedica.create', compact('citas', 'diagnosticos', 'tratamientos'));
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'ID_Cita'        => 'required|integer',
            'ID_Diagnostico' => 'required|integer',
            'ID_Tratamiento' => 'required|integer',
        ]);

        NotaMedica::create([
            'ID_Cita'        => $request->ID_Cita,
            'ID_Diagnostico' => $request->ID_Diagnostico,
            'ID_Tratamiento' => $request->ID_Tratamiento,
        ]);

        return redirect()->route('notamedica.index')
            ->with('success', 'Nota médica creada correctamente.');
    }

    // FORMULARIO EDITAR
    public function edit($id)
    {
        $nota = NotaMedica::findOrFail($id);

        $citas = Cita::all();
        $diagnosticos = Diagnostico::all();
        $tratamientos = Tratamiento::all();

        return view('notamedica.edit', compact(
            'nota',
            'citas',
            'diagnosticos',
            'tratamientos'
        ));
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Cita'        => 'required|integer',
            'ID_Diagnostico' => 'required|integer',
            'ID_Tratamiento' => 'required|integer',
        ]);

        $nota = NotaMedica::findOrFail($id);

        $nota->update([
            'ID_Cita'        => $request->ID_Cita,
            'ID_Diagnostico' => $request->ID_Diagnostico,
            'ID_Tratamiento' => $request->ID_Tratamiento,
        ]);

        return redirect()->route('notamedica.index')
            ->with('success', 'Nota médica actualizada.');
    }

    // ELIMINAR
    public function destroy($id)
    {
        NotaMedica::destroy($id);

        return redirect()->route('notamedica.index')
            ->with('success', 'Nota médica eliminada.');
    }
}
