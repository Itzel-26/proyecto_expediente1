@extends('components.layouts.app')
@section('title', 'Crear Usuario')
@section('content')

<div class="max-w-3xl mx-auto mt-6">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-xl font-semibold text-gray-800 mb-6">Crear Usuario</h2>

        <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Cédula del Personal --}}
            <div>
                <label class="block text-gray-700 mb-1">Cédula del Personal</label>
                <select name="Cedula" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="">--- Selecciona ---</option>
                    @foreach($personal as $p)
                        <option value="{{ $p->Cedula }}">{{ $p->Cedula }} - {{ $p->Nombre }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tipo Usuario --}}
            <div>
                <label class="block text-gray-700 mb-1">Tipo Usuario</label>
                <input type="text" name="Tipo_Usuario" required
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500">
            </div>

            {{-- No. Seguro Paciente --}}
            <div>
                <label class="block text-gray-700 mb-1">No. Seguro Paciente</label>
                <select name="ID_No_Seguro" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="">--- Selecciona ---</option>
                    @foreach($pacientes as $pa)
                        <option value="{{ $pa->ID_No_Seguro }}">{{ $pa->ID_No_Seguro }} - {{ $pa->Nombre }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-2 mt-4">
                <a href="{{ route('usuarios.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancelar</a>
                <button type="submit"
                        class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">Guardar</button>
            </div>

        </form>

    </div>

</div>

@endsection
