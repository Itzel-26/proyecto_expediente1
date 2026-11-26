@extends('components.layouts.app')

@section('title', 'Editar Perfil')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-xl font-semibold text-gray-800 mb-6">
            Editar Perfil
        </h2>

        <form action="{{ route('perfil.update', $perfil->ID_Perfil) }}"
              method="POST"
              class="space-y-4">
            @csrf
            @method('PUT')

            {{-- USUARIO DEL SISTEMA --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    ID Usuario
                </label>
                <input type="number"
                       name="ID_Usuario"
                       value="{{ old('ID_Usuario', $perfil->ID_Usuario) }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500"
                       required>
            </div>

            {{-- NOMBRE DE USUARIO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Usuario
                </label>
                <input type="text"
                       name="Usuario"
                       value="{{ old('Usuario', $perfil->Usuario) }}"
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
                       placeholder="Ingresa nueva contraseña"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500">
                <p class="text-xs text-gray-500 mt-1">
                    Déjalo vacío si no deseas cambiar la contraseña
                </p>
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
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
