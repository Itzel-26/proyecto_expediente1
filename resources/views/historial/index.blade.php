@extends('components.layouts.app')

@section('title', 'Historial de Diagnósticos')

@section('content')
<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <form method="GET" class="mb-4 flex items-center gap-2">
            <input type="text" name="buscar"
                   placeholder="Buscar por paciente"
                   value="{{ $buscar ?? request('buscar') }}"
                   class="border border-gray-300 rounded px-3 py-2 w-1/3">

            <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded">
                Buscar
            </button>

            @if(request('buscar'))
                <a href="{{ route('historial.index') }}" class="ml-2 text-sm text-red-500 hover:underline">
                    Quitar filtro
                </a>
            @endif
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        
                        <th class="px-4 py-3 text-left">Paciente</th>
                        <th class="px-4 py-3 text-left">Doctor</th>
                        <th class="px-4 py-3 text-left">Signos Vitales</th>
                        <th class="px-4 py-3 text-left">Medicamento</th>
                        <th class="px-4 py-3 text-left">Observaciones</th>
                        <th class="px-4 py-3 text-left">Indicaciones</th>
                        <th class="px-4 py-3 text-center">Fecha</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                    @forelse($diagnosticos as $d)
                    <tr class="hover:bg-gray-50">
                        
                        <td class="px-4 py-3 font-medium text-gray-700">
                            {{ $d->paciente->Nombre ?? '—' }}
                            {{ $d->paciente->Apellidos ?? '' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $d->doctor->Nombre ?? 'Dr. (No asignado)' }}
                            {{ $d->doctor->Apellidos ?? '' }}
                        </td>

                        <td class="px-4 py-3">
                            @if($d->signosVitales)
                                Temp: {{ $d->signosVitales->Temperatura }}°C<br>
                                Peso: {{ $d->signosVitales->Peso ?? '—' }}
                            @else
                                <span class="text-red-500">No registrados</span>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            {{ $d->medicamento->Nombre ?? '—' }}
                            <div class="text-xs text-gray-500">
                                {{ $d->medicamento->Tipo_presentacion ?? '' }}
                                {{ $d->medicamento->Via_administracion ?? '' }}
                            </div>
                        </td>

                        <td class="px-4 py-3">{{ Str::limit($d->Observaciones ?? '—', 80) }}</td>

                        <td class="px-4 py-3">{{ Str::limit($d->Indicaciones ?? '—', 80) }}</td>

                        <td class="px-4 py-3 text-center">
                            {{ $d->created_at ? $d->created_at->format('Y-m-d') : '—' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                            No hay diagnósticos.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $diagnosticos->links() }}
        </div>

    </div>

</div>
@endsection
