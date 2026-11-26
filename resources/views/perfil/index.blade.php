@extends('components.layouts.app')

@section('title', 'Listado de Perfiles')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- Botón --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('perfil.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Crear Perfil
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left">ID Perfil</th>
                        <th class="px-4 py-3 text-left">ID Usuario</th>
                        <th class="px-4 py-3 text-left">Usuario</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse($perfiles as $perfil)
                    <tr class="hover:bg-gray-50">

                        <td class="px-4 py-3">
                            {{ $perfil->ID_Perfil }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $perfil->ID_Usuario }}
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ $perfil->Usuario }}
                        </td>

                        {{-- Acciones --}}
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('perfil.edit', $perfil) }}"
                                   class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-xs font-medium">
                                    Editar
                                </a>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4"
                            class="px-4 py-6 text-center text-gray-500">
                            No hay perfiles registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
