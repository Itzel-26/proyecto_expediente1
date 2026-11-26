@extends('components.layouts.app')

@section('title', 'Agregar Medicamento')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white shadow rounded-lg p-6">

        {{-- Formulario --}}
        <form action="{{ route('catalogo_medicamentos.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nombre --}}
            <div>
                <label for="Nombre" class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre
                </label>
                <input
                    type="text"
                    name="Nombre"
                    id="Nombre"
                    value="{{ old('Nombre') }}"
                    required
                    class="w-full rounded-md border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                >
            </div>

            {{-- Tipo presentación --}}
            <div>
                <label for="Tipo_presentacion" class="block text-sm font-medium text-gray-700 mb-1">
                    Tipo de presentación
                </label>
                <input
                    type="text"
                    name="Tipo_presentacion"
                    id="Tipo_presentacion"
                    value="{{ old('Tipo_presentacion') }}"
                    required
                    class="w-full rounded-md border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                >
            </div>

            {{-- Vía de administración --}}
            <div>
                <label for="Via_administracion" class="block text-sm font-medium text-gray-700 mb-1">
                    Vía de administración
                </label>
                <input
                    type="text"
                    name="Via_administracion"
                    id="Via_administracion"
                    value="{{ old('Via_administracion') }}"
                    required
                    class="w-full rounded-md border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                >
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('catalogo_medicamentos.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 text-sm">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 text-sm">
                    Guardar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
