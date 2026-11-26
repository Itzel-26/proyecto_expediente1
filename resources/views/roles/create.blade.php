@extends('components.layouts.app')
@section('title', 'Crear Rol')
@section('content')

<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6 mt-6">

    <h2 class="text-xl font-semibold mb-4">Crear Rol</h2>

    <form action="{{ route('roles.store') }}" method="POST" id="formRol" class="space-y-4">
        @csrf

        {{-- Selección de Cédula --}}
        <div>
            <label class="block text-gray-700 font-medium mb-1">Cédula:</label>
            <select name="cedula" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                <option value="">Seleccione una cédula</option>
                @foreach($personal as $p)
                    <option value="{{ $p->Cedula }}">{{ $p->Cedula }} - {{ $p->Nombre ?? '' }}</option>
                @endforeach
            </select>
        </div>

        {{-- Selección de Rol --}}
        <div>
            <label class="block text-gray-700 font-medium mb-1">Rol:</label>
            <select id="rolSelect" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                <option value="">Seleccione un rol</option>
                <option value="administrador">Administrador</option>
                <option value="enfermera">Enfermera</option>
                <option value="doctor">Doctor</option>
            </select>
        </div>

        {{-- Campos ocultos que necesita el controlador --}}
        <input type="hidden" name="administrador" id="inputAdministrador">
        <input type="hidden" name="enfermera" id="inputEnfermera">
        <input type="hidden" name="doctor" id="inputDoctor">

        {{-- Botones --}}
        <div class="flex justify-end gap-2 mt-4">
            <a href="{{ route('roles.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Crear</button>
        </div>
    </form>

</div>

{{-- Script para asignar automáticamente el rol al campo correcto --}}
<script>
    document.getElementById('formRol').addEventListener('submit', function() {
        const rol = document.getElementById('rolSelect').value;

        document.getElementById('inputAdministrador').value = (rol === 'administrador') ? '1' : null;
        document.getElementById('inputEnfermera').value     = (rol === 'enfermera') ? '1' : null;
        document.getElementById('inputDoctor').value        = (rol === 'doctor') ? '1' : null;
    });
</script>

@endsection
