@extends('components.layouts.app')

@section('title', 'Listado de Diagnósticos')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <div class="flex justify-end mb-4">
            <a href="{{ route('diagnostico.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Crear diagnóstico
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Paciente</th>
                        <th class="px-4 py-3 text-left">Signos Vitales</th>
                        <th class="px-4 py-3 text-left">Doctor</th>

                        {{-- Campos nuevos --}}
                        <th class="px-4 py-3 text-left">Observaciones</th>
                        <th class="px-4 py-3 text-left">Medicamento</th>
                        <th class="px-4 py-3 text-left">Indicaciones</th>

                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                    @foreach($diagnosticos as $d)
                    <tr class="hover:bg-gray-50">

                        {{-- ID --}}
                        <td class="px-4 py-3">
                            {{ $d->ID_Diagnostico }}
                        </td>

                        {{-- Paciente --}}
                        <td class="px-4 py-3 font-medium text-gray-700">
                            {{ $d->paciente->Nombre ?? '' }}
                            {{ $d->paciente->Apellidos ?? '' }}
                        </td>

                        {{-- Signos Vitales --}}
                        <td class="px-4 py-3">
                            @if($d->signosVitales)
                                <strong>Temp:</strong> {{ $d->signosVitales->Temperatura }}°C<br>
                                <strong>Altura:</strong> {{ $d->signosVitales->Altura }}<br>
                                <strong>Presión:</strong> {{ $d->signosVitales->Presion }}<br>
                                <strong>Peso:</strong> {{ $d->signosVitales->Peso }} kg
                            @else
                                <span class="text-red-500">No registrado</span>
                            @endif
                        </td>

                        {{-- Doctor --}}
                        <td class="px-4 py-3">
                            {{ $d->doctor->Nombre ?? 'No asignado' }} {{ $d->doctor->Apellidos ?? '' }}
                        </td>

                        {{-- Observaciones --}}
                        <td class="px-4 py-3">
                            {{ $d->Observaciones ?? 'Sin observaciones' }}
                        </td>

                        {{-- Medicamento --}}
                        <td class="px-4 py-3">
                            {{ $d->medicamento->Nombre ?? 'Sin medicamento' }}
                             {{ $d->medicamento->Tipo_presentacion ?? 'Sin medicamento' }}
                              {{ $d->medicamento->Via_administracion ?? 'Sin medicamento' }}
                        </td>

                        {{-- Indicaciones --}}
                        <td class="px-4 py-3">
                            {{ $d->Indicaciones ?? 'Sin indicaciones' }}
                        </td>

                        {{-- Acciones --}}
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('diagnostico.edit', $d->ID_Diagnostico) }}"
                               class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-xs font-medium">
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
