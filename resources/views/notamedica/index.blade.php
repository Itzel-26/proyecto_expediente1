@extends('components.layouts.app')

@section('title', 'Listado de Notas Médicas')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">
        <form method="GET" class="mb-4">
        <input type="text" name="buscar"
            placeholder="Buscar por nombre del paciente..."
            value="{{ request('buscar') }}"
            class="border border-gray-300 rounded px-3 py-2 w-1/3">

        <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded">
            Buscar
        </button>

        @if(request('buscar'))
            <a href="{{ route('notamedica.index') }}"
            class="ml-2 text-sm text-red-500 hover:underline">
                Quitar filtro
            </a>
        @endif
    </form>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Cita</th>
                        <th class="px-4 py-3 text-left">Diagnóstico</th>
                        <th class="px-4 py-3 text-left">Tratamiento</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse($notas as $nota)
                    <tr class="hover:bg-gray-50">

                        {{-- ID --}}
                        <td class="px-4 py-3">
                            {{ $nota->ID_Nota }}
                        </td>

                        {{-- CITA --}}
                        <td class="px-4 py-3">
                            @if($nota->cita)
                                <span class="block font-medium text-gray-700">
                                    {{ $nota->cita->paciente->Nombre ?? '—' }}
                                    {{ $nota->cita->paciente->Apellidos ?? '' }}
                                </span>
                                <span class="block text-xs text-gray-500">
                                    {{ $nota->cita->Dia }} | {{ $nota->cita->Hora }}
                                </span>
                            @else
                                <span class="text-red-500">No registrada</span>
                            @endif
                        </td>

                        {{-- DIAGNÓSTICO --}}
<td class="px-4 py-3">
    @if($nota->diagnostico)

        {{-- Paciente --}}
        <div class="mb-1">
            <strong>Paciente:</strong><br>
            {{ $nota->diagnostico->paciente->Nombre ?? '' }}
            {{ $nota->diagnostico->paciente->Apellidos ?? '' }}
        </div>

        {{-- Doctor --}}
        <div class="mb-1">
            <strong>Doctor:</strong><br>
            {{ $nota->diagnostico->doctor->Nombre ?? 'No asignado' }}
            {{ $nota->diagnostico->doctor->Apellidos ?? '' }}
        </div>

        {{-- Signos Vitales --}}
        <div class="mb-1">
            <strong>Signos Vitales:</strong><br>
            @if($nota->diagnostico->signosVitales)
                Temp: {{ $nota->diagnostico->signosVitales->Temperatura }}°C <br>
                Altura: {{ $nota->diagnostico->signosVitales->Altura }} <br>
                Presión: {{ $nota->diagnostico->signosVitales->Presion }} <br>
                Peso: {{ $nota->diagnostico->signosVitales->Peso }} kg
            @else
                <span class="text-red-500">No registrados</span>
            @endif
        </div>

        {{-- Observaciones --}}
        <div class="mb-1">
            <strong>Observaciones:</strong><br>
            {{ $nota->diagnostico->Observaciones ?? 'Sin observaciones' }}
        </div>

        {{-- Medicamento --}}
        <div class="mb-1">
            <strong>Medicamento:</strong><br>
            {{ $nota->diagnostico->medicamento->Nombre ?? 'Sin medicamento' }}
            {{ $nota->diagnostico->medicamento->Tipo_presentacion ?? '' }}
            {{ $nota->diagnostico->medicamento->Via_administracion ?? '' }}
        </div>

        {{-- Indicaciones --}}
        <div class="mb-1">
            <strong>Indicaciones:</strong><br>
            {{ $nota->diagnostico->Indicaciones ?? 'Sin indicaciones' }}
        </div>

    @else
        <span class="text-red-500">No asignado</span>
    @endif
</td>


                        {{-- TRATAMIENTO --}}
                        <td class="px-4 py-3">
                            @if($nota->tratamiento)
                                <span class="block font-medium">
                                    {{ $nota->tratamiento->medicamento->Nombre ?? '—' }}
                                </span>
                                <span class="block text-xs text-gray-500">
                                    Vía: {{ $nota->tratamiento->Via_Admin }}
                                </span>
                            @else
                                <span class="text-red-500">No asignado</span>
                            @endif
                        </td>

                        {{-- ACCIONES --}}
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('notamedica.edit', $nota->ID_Nota) }}"
                                   class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-xs font-medium">
                                    Editar
                                </a>

                                <form action="{{ route('notamedica.destroy', $nota->ID_Nota) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Eliminar nota médica?')">
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
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            No hay notas médicas registradas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
