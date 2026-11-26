<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use Gate;

class EspecialidadController extends Controller
{
    // 🔹 Mostrar listado
    public function index()
    {
        Gate:: authorize('viewAny', Especialidad::class);
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }

    // 🔹 Mostrar formulario de creación
    public function create()
    {
        return view('especialidades.create');
    }

    // 🔹 Guardar nueva especialidad
    public function store(Request $request)
    {
        $request->validate([
            'Tipo_Especialidad' => 'required|string|max:255',
        ]);

        $especialidad = new Especialidad();
        $especialidad->Tipo_Especialidad = $request->input('Tipo_Especialidad');
        $especialidad->save();

        return redirect()->route('especialidades.index')-> with('success','NUEVA ESPECIALIDAD AGREGADA');
    }

    // 🔹 Editar especialidad
    public function edit(Especialidad $especialidad)
    {
        return view('especialidades.edit', compact('especialidad'));
    }

    // 🔹 Actualizar especialidad
    public function update(Request $request, Especialidad $especialidad)
    {
        $request->validate([
            'Tipo_Especialidad' => 'required|string|max:255',
        ]);

        $especialidad->Tipo_Especialidad = $request->input('Tipo_Especialidad');
        $especialidad->save();

        return redirect()->route('especialidades.index')-> with('success','ESPECIALIDAD ACTUALIZADA');
    }

    // 🔹 Eliminar especialidad
    public function destroy(Especialidad $especialidad)
    {
        $especialidad->delete();
        return redirect()->route('especialidades.index')-> with('success','ESPECIALIDAD ELIMINADA');
    }
}
