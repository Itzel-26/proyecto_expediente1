<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Rol;
use App\Models\Personal;
use App\Models\Paciente;
use App\Models\Especialidad;
use Gate;

class CitaController extends Controller
{
    // -------------------------------------------------------
    // 🔹 Mostrar listado de citas
    // -------------------------------------------------------
    public function index()
    {
        Gate::authorize('viewAny', Cita::class);
        $citas = Cita::with(['enfermera', 'especialidad', 'paciente'])->get();
    return view('cita.index', compact('citas'));
    }

    // -------------------------------------------------------
    // 🔹 Mostrar formulario de creación
    // -------------------------------------------------------
    public function create()
    {
        $enfermeras = Rol::join('personal', 'rol.cedula', '=', 'personal.Cedula')
            ->where('rol.enfermera', 1)
            ->select('personal.Cedula', 'personal.Nombre', 'personal.Apellidos')
            ->get();

        $pacientes = Paciente::select('ID_No_Seguro', 'Nombre', 'Apellidos')->get();

        $especialidades = Especialidad::all();

        return view(
            'cita.create',
            compact('enfermeras', 'pacientes', 'especialidades')
        );
    }


    // -------------------------------------------------------
    // 🔹 Guardar nueva cita
    // -------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'Enfermera'       => 'required|string',
            'ID_Especialidad' => 'required|integer',
            'ID_No_Seguro'    => 'required|integer',
            'Dia'             => 'required|date',
            'Hora'            => 'required'
        ]);

        Cita::create([
            'Enfermera'       => $request->Enfermera,
            'ID_Especialidad' => $request->ID_Especialidad,
            'ID_No_Seguro'    => $request->ID_No_Seguro,
            'Dia'             => $request->Dia,
            'Hora'            => $request->Hora
        ]);

        return redirect()->route('cita.index')
            ->with('success','NUEVA CITA AGREGADA');
    }


    // -------------------------------------------------------
    // 🔹 Mostrar formulario de edición
    // Las vistas pasan: route('cita.edit', ['ID_Cita'=>x,'Enfermera'=>y])
    // -------------------------------------------------------
    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        return view('cita.edit', compact('cita'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        $request->validate([
            'ID_Especialidad'=> 'required|integer',
            'ID_No_Seguro'   => 'required|integer',
            'Dia'            => 'required|date',
            'Hora'           => 'required'
        ]);

        $cita->update($request->all());

        return redirect()->route('cita.index')
            ->with('success','CITA ACTUALIZADA');
    }

}
