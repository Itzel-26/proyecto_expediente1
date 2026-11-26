<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Paciente;
use App\Models\SignosVitales;
use App\Models\Personal;
use App\Models\Rol;
use App\Models\CatalogoMedicamentos;
use App\Http\Requests\DiagnosticoRequest;
use Gate;

class DiagnosticoController extends Controller
{
    /** LISTADO */
    public function index()
    {
        Gate::authorize('viewAny', Diagnostico::class);

        $diagnosticos = Diagnostico::with([
            'paciente',
            'signosVitales',
            'doctor',
            'medicamento'
        ])->get();

        return view('diagnostico.index', compact('diagnosticos'));
    }

    /** FORMULARIO CREAR */
    public function create()
    {
        $pacientes = Paciente::all();
        $signosvitales = SignosVitales::all();
        $medicamentos = CatalogoMedicamentos::all();

        $personal = Rol::join('personal', 'rol.cedula', '=', 'personal.Cedula')
            ->where('rol.doctor', 1)
            ->select('personal.Cedula', 'personal.Nombre', 'personal.Apellidos')
            ->get();

        return view('diagnostico.create', compact(
            'pacientes',
            'signosvitales',
            'medicamentos',
            'personal'
        ));
    }

    /** GUARDAR */
    public function store(DiagnosticoRequest $request)
    {
        Diagnostico::create($request->validated());

        return redirect()->route('diagnostico.index')
            ->with('success', 'Diagnóstico registrado correctamente');
    }

    /** FORMULARIO EDITAR */
    public function edit(Diagnostico $diagnostico)
    {
        $pacientes = Paciente::all();
        $signosvitales = SignosVitales::all();
        $medicamentos = CatalogoMedicamentos::all();

        $personal = Rol::join('personal', 'rol.cedula', '=', 'personal.Cedula')
            ->where('rol.doctor', 1)
            ->select('personal.Cedula', 'personal.Nombre', 'personal.Apellidos')
            ->get();

        return view('diagnostico.edit', compact(
            'diagnostico',
            'pacientes',
            'signosvitales',
            'medicamentos',
            'personal'
        ));
    }

    /** ACTUALIZAR */
    public function update(DiagnosticoRequest $request, Diagnostico $diagnostico)
    {
        $diagnostico->update($request->validated());

        return redirect()->route('diagnostico.index')
            ->with('success', 'Diagnóstico actualizado');
    }

    /** ELIMINAR */
    public function destroy(Diagnostico $diagnostico)
    {
        $diagnostico->delete();

        return redirect()->route('diagnostico.index')
            ->with('success', 'Diagnóstico eliminado');
    }
}
