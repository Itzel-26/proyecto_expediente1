<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignosVitales;
use App\Models\Paciente;
use App\Models\Personal;
use Gate;

class SignosVitalesController extends Controller
{
    // ============================
    // LISTAR
    // ============================
    public function index()
    {
        Gate::authorize('viewAny', SignosVitales::class);
        $signos = SignosVitales::all();
        return view('signosvitales.index', compact('signos'));
    }

    // ============================
    // MOSTRAR FORMULARIO DE CREACIÓN
    // ============================
    public function create()
    {
         $pacientes = Paciente::all();   // Para número de seguro
    $personal = Personal::all();   // Para cédulas del personal

    return view('signosvitales.create', compact('pacientes', 'personal'));
    }

    // ============================
    // GUARDAR NUEVO REGISTRO
    // ============================
    public function store(Request $request)
    {
        $request->validate([
            'ID_No_Seguro' => 'required|numeric',
            'Cedula'       => 'required|string',
            'Presion'      => 'required|string',
            'Altura'       => 'required|string',
            'Temperatura'  => 'required|string',
            'Peso'         => 'required|string',
        ]);

        SignosVitales::create($request->all());

        return redirect()->route('signosvitales.index')
            ->with('success', 'Signos vitales registrados correctamente.');
    }

    // ============================
    // FORMULARIO DE EDICIÓN
    // ============================
    public function edit($id)
    {
        $signo = SignosVitales::findOrFail($id);
        return view('signosvitales.edit', compact('signo'));
    }

    // ============================
    // ACTUALIZAR REGISTRO
    // ============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_No_Seguro' => 'required|numeric',
            'Cedula'       => 'required|string',
            'Presion'      => 'required|string',
            'Altura'       => 'required|string',
            'Temperatura'  => 'required|string',
            'Peso'         => 'required|string',
        ]);

        $signo = SignosVitales::findOrFail($id);
        $signo->update($request->all());

        return redirect()->route('signosvitales.index')
            ->with('success', 'Signos vitales actualizados correctamente.');
    }
}
