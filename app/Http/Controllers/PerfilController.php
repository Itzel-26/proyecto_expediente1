<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Usuario;
use Gate;

class PerfilController extends Controller
{
    // ============================================
    // 🔹 MOSTRAR LISTADO
    // ============================================
    public function index()
    {
        Gate:: authorize('viewAny', Perfil::class);
        $perfiles = Perfil::all();
        return view('perfil.index', compact('perfiles'));
    }

    // ============================================
    // 🔹 FORMULARIO CREAR
    // ============================================
    public function create()
    {
        $usuarios = Usuario::all();
    return view('perfil.create', compact('usuarios'));
    }

    // ============================================
    // 🔹 GUARDAR NUEVO PERFIL
    // ============================================
    public function store(Request $request)
    {
        $request->validate([
            'ID_Usuario' => 'required|integer',
            'Usuario'    => 'required|string|max:255',
            'Contraseña' => 'required|string|max:255',
        ]);

        $perfil = new Perfil();
        $perfil->ID_Usuario = $request->ID_Usuario;
        $perfil->Usuario = $request->Usuario;
        $perfil->Contraseña = $request->Contraseña;
        $perfil->save();

        return redirect()->route('perfil.index')-> with('success','NUEVO PERFIL CREADO');
    }

    // ============================================
    // 🔹 FORMULARIO EDITAR
    // ============================================
    public function edit(Perfil $perfil)
    {
        return view('perfil.edit', compact('perfil'));
    }

    // ============================================
    // 🔹 ACTUALIZAR PERFIL
    // ============================================
    public function update(Request $request, Perfil $perfil)
    {
        $request->validate([
            'ID_Usuario' => 'required|integer',
            'Usuario'    => 'required|string|max:255',
            'Contraseña' => 'required|string|max:255',
        ]);

        $perfil->ID_Usuario = $request->ID_Usuario;
        $perfil->Usuario = $request->Usuario;
        $perfil->Contraseña = $request->Contraseña;
        $perfil->save();

        return redirect()->route('perfil.index')-> with('success','PERFIL ACTUALIZADO');
    }
}
