@extends('components.layouts.app')

@section('title', 'Listado de Pacientes')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- Botón --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('pacientes.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Agregar Paciente
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left">No. Seguro</th>
                        <th class="px-4 py-3 text-left">Nombre</th>
                        <th class="px-4 py-3 text-left">Apellidos</th>
                        <th class="px-4 py-3 text-left">Sexo</th>
                        <th class="px-4 py-3 text-left">Teléfono</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse($pacientes as $paciente)
                    <tr class="hover:bg-gray-50">

                        <td class="px-4 py-3">
                            {{ $paciente->ID_No_Seguro }}
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-700">
                            {{ $paciente->Nombre }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $paciente->Apellidos }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $paciente->Sexo }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $paciente->Telefono }}
                        </td>

                        {{-- Acciones --}}
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('pacientes.edit', $paciente->ID_No_Seguro) }}"
                                   class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-xs font-medium">
                                    Editar
                                </a>

                                <form action="{{ route('pacientes.destroy', $paciente->ID_No_Seguro) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Eliminar paciente?')">
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
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            No hay pacientes registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
