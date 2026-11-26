<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Paciente;
use App\Models\Personal;
use Illuminate\Http\Request;
use Gate;

class UsuarioController extends Controller
{
    // LISTADO
    public function index()
    {
        Gate::authorize('viewAny', Usuario::class);
        $usuarios = Usuario::with(['paciente', 'personal'])->get();
        return view('usuarios.index', compact('usuarios'));
    }

    // FORMULARIO CREAR
    public function create()
    {
        $pacientes = Paciente::all();
        $personal = Personal::all();

        return view('usuarios.create', compact('pacientes', 'personal'));
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'Cedula' => 'nullable|string|exists:personal,Cedula',
            'Tipo_Usuario' => 'required|string|max:50',
            'ID_No_Seguro' => 'nullable|integer|exists:pacientes,ID_No_Seguro'
        ]);

        Usuario::create([
        'Cedula' => $request->Cedula,
        'Tipo_Usuario' => $request->Tipo_Usuario,
        'ID_No_Seguro' => $request->ID_No_Seguro
    ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // FORMULARIO EDITAR
    public function edit(Usuario $usuario)
    {
        $pacientes = Paciente::all();
        $personal = Personal::all();

        return view('usuarios.edit', compact('usuario', 'pacientes', 'personal'));
    }

    // ACTUALIZAR
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'Cedula' => 'nullable|string|exists:personal,Cedula',
            'Tipo_Usuario' => 'required|string|max:50',
            'ID_No_Seguro' => 'nullable|integer|exists:pacientes,ID_No_Seguro'
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // ELIMINAR
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado.');
    }
}
