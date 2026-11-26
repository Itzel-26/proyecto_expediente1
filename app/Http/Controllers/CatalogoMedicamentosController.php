<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogoMedicamentos;
use Gate;

class CatalogoMedicamentosController extends Controller
{
    // 🔹 Mostrar listado de medicamentos
    public function index()
    {
        Gate::authorize('viewAny', CatalogoMedicamentos::class);
        $medicamentos = CatalogoMedicamentos::all();
        return view('catalogo_medicamentos.index', compact('medicamentos'));
    }

    // 🔹 Mostrar formulario de creación
    public function create()
    {
        return view('catalogo_medicamentos.create');
    }

    // 🔹 Guardar medicamento nuevo
    public function store(Request $request)
    {
        $request->validate([
            'Nombre'             => 'required|string|max:255',
            'Tipo_presentacion'  => 'required|string|max:255',
            'Via_administracion' => 'required|string|max:255', // Nuevo campo
        ]);

        $medicamento = new CatalogoMedicamentos();
        $medicamento->Nombre = $request->input('Nombre');
        $medicamento->Tipo_presentacion = $request->input('Tipo_presentacion');
        $medicamento->Via_administracion = $request->input('Via_administracion'); // Nuevo campo
        $medicamento->save();

        return redirect()->route('catalogo_medicamentos.index')->with('success','NUEVO MEDICAMENTO AGREGADO');
    }

    // 🔹 Mostrar formulario de edición
    public function edit(CatalogoMedicamentos $catalogo_medicamento)
    {
        return view('catalogo_medicamentos.edit', [
            'medicamento' => $catalogo_medicamento
        ]);
    }

    // 🔹 Actualizar medicamento
    public function update(Request $request, CatalogoMedicamentos $catalogo_medicamento)
    {
        $request->validate([
            'Nombre'             => 'required|string|max:255',
            'Tipo_presentacion'  => 'required|string|max:255',
            'Via_administracion' => 'required|string|max:255', // Nuevo campo
        ]);

        $catalogo_medicamento->Nombre = $request->input('Nombre');
        $catalogo_medicamento->Tipo_presentacion = $request->input('Tipo_presentacion');
        $catalogo_medicamento->Via_administracion = $request->input('Via_administracion'); // Nuevo campo
        $catalogo_medicamento->save();

        return redirect()->route('catalogo_medicamentos.index')->with('success','MEDICAMENTO ACTUALIZADO');
    }

    // 🔹 Eliminar medicamento
    public function destroy(CatalogoMedicamentos $catalogo_medicamento)
    {
        $catalogo_medicamento->delete();
        return redirect()->route('catalogo_medicamentos.index')->with('success','MEDICAMENTO ELIMINADO');
    }
}
