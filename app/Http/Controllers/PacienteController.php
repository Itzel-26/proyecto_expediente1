<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Gate;

class PacienteController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Paciente::class);
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_No_Seguro' => 'required|integer|unique:pacientes,ID_No_Seguro',
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'Edad' => 'required|integer|min:0|max:120',
            'Telefono' => 'nullable|string|max:20',
            'Sexo' => 'required|in:M,F'
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente creado correctamente');
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'Telefono' => 'nullable|string|max:20',
            'Sexo' => 'required|in:M,F'
        ]);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente actualizado correctamente');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente eliminado correctamente');
    }
}
