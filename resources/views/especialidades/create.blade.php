@extends('components.layouts.app')

@section('title', 'Crear Especialidad')

@section('content')

<div class="max-w-xl mx-auto">

    <h2 class="text-xl font-semibold text-center text-gray-800 mb-6">
        Crear Nueva Especialidad
    </h2>

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('especialidades.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="Tipo_Especialidad"
                       class="block text-sm font-medium text-gray-700 mb-1">
                    Tipo de Especialidad
                </label>

                <input
                    type="text"
                    id="Tipo_Especialidad"
                    name="Tipo_Especialidad"
                    value="{{ old('Tipo_Especialidad') }}"
                    required
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500"
                >
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('especialidades.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">
                    Guardar
                </button>
            </div>
        </form>

    </div>

</div>

@endsection
