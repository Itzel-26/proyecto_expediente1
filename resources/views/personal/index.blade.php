@extends('components.layouts.app')

@section('title', 'Listado de Personal')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- Botón --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('personal.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Crear Personal
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left">Cédula</th>
                        <th class="px-4 py-3 text-left">Nombre</th>
                        <th class="px-4 py-3 text-left">Apellidos</th>
                        <th class="px-4 py-3 text-left">Especialidad</th>
                        <th class="px-4 py-3 text-left">RFC</th>
                        <th class="px-4 py-3 text-left">Teléfono</th>
                        <th class="px-4 py-3 text-left">Correo</th>
                        <th class="px-4 py-3 text-left">Sexo</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse($personal as $p)
                    <tr class="hover:bg-gray-50">

                        <td class="px-4 py-3">
                            {{ $p->Cedula }}
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-700">
                            {{ $p->Nombre }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->Apellidos }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->especialidad->Tipo_Especialidad ?? 'N/A' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->RFC }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->Telefono }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->Correo }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->Sexo }}
                        </td>

                        {{-- Acciones --}}
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('personal.edit', $p) }}"
                                   class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-xs font-medium">
                                    Editar
                                </a>

                                <form action="{{ route('personal.destroy', $p->Cedula) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar a este personal?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-xs font-medium">
                                        Eliminar
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                            No hay personal registrado.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
