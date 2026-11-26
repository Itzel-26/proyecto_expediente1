@extends('components.layouts.app')
@section('title', 'Signos Vitales')
@section('content')

<div class="max-w-7xl mx-auto mt-6">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- Botón crear --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('signosvitales.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Crear Signos Vitales
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg text-sm">

                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border text-left">ID</th>
                        <th class="px-4 py-2 border text-left">No. Seguro</th>
                        <th class="px-4 py-2 border text-left">Cédula</th>
                        <th class="px-4 py-2 border text-left">Presión</th>
                        <th class="px-4 py-2 border text-left">Altura</th>
                        <th class="px-4 py-2 border text-left">Temperatura</th>
                        <th class="px-4 py-2 border text-left">Peso</th>
                        <th class="px-4 py-2 border text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 divide-y divide-gray-200">
                    @forelse($signos as $sv)
                    <tr class="hover:bg-gray-50">

                        <td class="px-4 py-2 border">{{ $sv->ID_Signos_Vitales }}</td>

                        <td class="px-4 py-2 border">
                            {{ $sv->ID_No_Seguro }} - {{ $sv->paciente->Nombre ?? 'Desconocido' }}
                        </td>

                        <td class="px-4 py-2 border">
                            {{ $sv->Cedula }} - {{ $sv->personal->Nombre ?? 'Sin nombre' }}
                        </td>

                        <td class="px-4 py-2 border">{{ $sv->Presion }}</td>
                        <td class="px-4 py-2 border">{{ $sv->Altura }}</td>
                        <td class="px-4 py-2 border">{{ $sv->Temperatura }}</td>
                        <td class="px-4 py-2 border">{{ $sv->Peso }}</td>

                        {{-- Acciones --}}
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('signosvitales.edit', $sv->ID_Signos_Vitales) }}"
                               class="px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 text-xs font-medium">
                                Editar
                            </a>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                            No hay signos vitales registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
