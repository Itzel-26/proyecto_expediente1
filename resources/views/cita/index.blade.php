@extends('components.layouts.app')

@section('title', 'Citas')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="bg-white shadow rounded-lg p-6">

        {{-- Botón crear --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('cita.create') }}"
               class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 text-sm font-medium">
                + Crear nueva cita
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-2 border">ID Cita</th>
                        <th class="px-3 py-2 border">Enfermera</th>
                        <th class="px-3 py-2 border">Especialidad</th>
                        <th class="px-3 py-2 border">Paciente</th>
                        <th class="px-3 py-2 border">Día</th>
                        <th class="px-3 py-2 border">Hora</th>
                        <th class="px-3 py-2 border text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($citas as $cita)
                    <tr class="hover:bg-gray-50">

                        <td class="px-3 py-2 border">
                            {{ $cita->ID_Cita }}
                        </td>

                        {{-- Enfermera --}}
                        <td class="px-3 py-2 border">
                            {{ $cita->Enfermera }}
                            —
                            {{ $cita->enfermera->Nombre ?? 'Sin nombre' }}
                        </td>

                        {{-- Especialidad --}}
                        <td class="px-3 py-2 border">
                            {{ $cita->ID_Especialidad }}
                            —
                            {{ $cita->especialidad->Tipo_Especialidad ?? 'Sin descripción' }}
                        </td>

                        {{-- Paciente --}}
                        <td class="px-3 py-2 border">
                            {{ $cita->paciente->Nombre ?? 'No encontrado' }}
                            {{ $cita->paciente->Apellidos ?? '' }}
                        </td>

                        <td class="px-3 py-2 border">
                            {{ $cita->Dia }}
                        </td>

                        <td class="px-3 py-2 border">
                            {{ $cita->Hora }}
                        </td>

                        {{-- Acciones --}}
                        <td class="px-3 py-2 border text-center">
                            <a href="{{ route('cita.edit', $cita->ID_Cita) }}"
                               class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-xs">
                                Editar
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection
