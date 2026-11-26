<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Personal;
use Gate;

class RolController extends Controller
{
    // 🔹 Listado de roles
    public function index()
    {
        Gate:: authorize('viewAny', Rol::class);
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    // 🔹 Mostrar formulario para crear
    public function create()
    {
      $personal = Personal::all(); // ← enviamos la lista de personal
    return view('roles.create', compact('personal'));
    }

    // 🔹 Guardar nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'cedula'        => 'required|string|max:20',
            'administrador' => 'nullable|string|max:50',
            'enfermera'     => 'nullable|string|max:50',
            'doctor'        => 'nullable|string|max:50',
        ]);

        $rol = new Rol();
        $rol->cedula        = $request->cedula;
        $rol->administrador = $request->administrador;
        $rol->enfermera     = $request->enfermera;
        $rol->doctor        = $request->doctor;
        $rol->save();

        return redirect()->route('roles.index')-> with('success','NUEVO ROL AGREGADO');
    }

    // 🔹 Editar rol
    public function edit(Rol $rol)
    {
        $personal = \App\Models\Personal::all();
        return view('roles.edit', compact('rol', 'personal'));
    }

    // 🔹 Actualizar rol
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'cedula'        => 'required|string|max:20',
            'administrador' => 'nullable|string|max:50',
            'enfermera'     => 'nullable|string|max:50',
            'doctor'        => 'nullable|string|max:50',
        ]);

        $rol->cedula        = $request->cedula;
        $rol->administrador = $request->administrador;
        $rol->enfermera     = $request->enfermera;
        $rol->doctor        = $request->doctor;
        $rol->save();

        return redirect()->route('roles.index')-> with('success','ROL ACTUALIZADO');
    }

    // 🔹 Eliminar rol
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return redirect()->route('roles.index')-> with('success','ROL ELIMINADO');
    }
}
