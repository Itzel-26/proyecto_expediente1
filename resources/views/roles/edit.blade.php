@extends('components.layouts.app')
@section('title', 'Editar Rol')
@section('content')

<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6 mt-6">

    <h2 class="text-xl font-semibold mb-4">Editar Rol</h2>

    <form action="{{ route('roles.update', $rol->cedula) }}" method="POST" id="formRol" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Selección de Cédula --}}
        <div>
            <label class="block text-gray-700 font-medium mb-1">Cédula:</label>
            <select name="cedula" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                @foreach($personal as $p)
                    <option value="{{ $p->Cedula }}" {{ $rol->cedula == $p->Cedula ? 'selected' : '' }}>
                        {{ $p->Cedula }} - {{ $p->Nombre ?? '' }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Selección de Rol --}}
        <div>
            <label class="block text-gray-700 font-medium mb-1">Rol:</label>
            <select id="rolSelect" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                <option value="">Seleccione un rol</option>
                <option value="administrador" {{ $rol->administrador ? 'selected' : '' }}>Administrador</option>
                <option value="enfermera"     {{ $rol->enfermera ? 'selected' : '' }}>Enfermera</option>
                <option value="doctor"        {{ $rol->doctor ? 'selected' : '' }}>Doctor</option>
            </select>
        </div>

        {{-- Campos ocultos --}}
        <input type="hidden" name="administrador" id="inputAdministrador" value="{{ $rol->administrador }}">
        <input type="hidden" name="enfermera" id="inputEnfermera" value="{{ $rol->enfermera }}">
        <input type="hidden" name="doctor" id="inputDoctor" value="{{ $rol->doctor }}">

        {{-- Botones --}}
        <div class="flex justify-end gap-2 mt-4">
            <a href="{{ route('roles.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Guardar cambios</button>
        </div>
    </form>

</div>

{{-- Script para asignar automáticamente el rol al campo oculto correcto --}}
<script>
    const select = document.getElementById('rolSelect');
    const admin = document.getElementById('inputAdministrador');
    const enf = document.getElementById('inputEnfermera');
    const doc = document.getElementById('inputDoctor');

    function actualizarCampos() {
        admin.value = "";
        enf.value = "";
        doc.value = "";

        if (select.value === "administrador") admin.value = "1";
        if (select.value === "enfermera") enf.value = "1";
        if (select.value === "doctor") doc.value = "1";
    }

    select.addEventListener("change", actualizarCampos);

    // Ejecutar al cargar para dejar todo correcto
    actualizarCampos();
</script>

@endsection
