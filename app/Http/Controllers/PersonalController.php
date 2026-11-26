<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Especialidad;
use Gate;

class PersonalController extends Controller
{
    // 🔹 Mostrar listado
    public function index()
    {
        Gate:: authorize('viewAny', Personal::class);
        $personal = Personal::with('especialidad')->get(); // carga relación
        return view('personal.index', compact('personal'));
    }

    // 🔹 Mostrar formulario de creación
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('personal.create', compact('especialidades'));
    }

    // 🔹 Guardar nuevo personal
    public function store(Request $request)
    {
        $request->validate([
            'Cedula'         => 'required|string|max:20|unique:personal,Cedula',
            'Nombre'         => 'required|string|max:100',
            'Apellidos'      => 'required|string|max:150',
            'ID_Especialidad'=> 'required|integer',
            'RFC'            => 'required|string|max:20',
            'Telefono'       => 'required|string|max:20',
            'Correo'         => 'required|email|max:100',
            'Sexo'           => 'required|in:M,F'
        ]);

        Personal::create($request->all());

        return redirect()->route('personal.index')-> with('success','NUEVO PERSONAL CREADO');
    }

    // 🔹 Mostrar formulario de edición
    public function edit(Personal $personal)
    {
        $especialidades = Especialidad::all();
        return view('personal.edit', compact('personal', 'especialidades'));
    }

    // 🔹 Actualizar personal
    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'Nombre'         => 'required|string|max:100',
            'Apellidos'      => 'required|string|max:150',
            'ID_Especialidad'=> 'required|integer',
            'RFC'            => 'required|string|max:20',
            'Telefono'       => 'required|string|max:20',
            'Correo'         => 'required|email|max:100',
            'Sexo'           => 'required|in:M,F'
        ]);

        // La cédula no se actualiza porque está deshabilitada en la vista
        $personal->update($request->all());

        return redirect()->route('personal.index')-> with('success','PERSONAL ACTUALIZADO');
    }

    // 🔹 (Opcional) Eliminar personal
    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route('personal.index')-> with('success','PERSONAL ELIMINADO');
    }
}
