@extends('components.layouts.app')

@section('title', 'Crear Perfil')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-xl font-semibold text-gray-800 mb-6">
            Crear Nuevo Perfil
        </h2>

        <form action="{{ route('perfil.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- USUARIO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Usuario del sistema
                </label>
                <select name="ID_Usuario"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500"
                        required>
                    <option value="">Seleccione un usuario...</option>
                    @foreach($usuarios as $u)
                        <option value="{{ $u->ID_Usuario }}">
                            {{ $u->ID_Usuario }} - {{ $u->Tipo_Usuario }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- NOMBRE DE USUARIO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Usuario
                </label>
                <input type="text"
                       name="Usuario"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500"
                       required>
            </div>

            {{-- CONTRASEÑA --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Contraseña
                </label>
                <input type="password"
                       name="Contraseña"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500"
                       required>
            </div>

            {{-- BOTONES --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('perfil.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                    Guardar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
