@extends('components.layouts.app')

@section('title', 'Editar Nota Médica')

@section('content')

<div class="max-w-3xl mx-auto">

    <h2 class="text-xl font-semibold text-center text-gray-800 mb-6">
        Editar Nota Médica
    </h2>

    <form action="{{ route('notamedica.update', $nota->ID_Nota) }}"
          method="POST"
          class="bg-white shadow-md rounded-lg p-6 space-y-5">
        @csrf
        @method('PUT')

        {{-- CITA --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Cita
            </label>
            <select name="ID_Cita" required
                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                <option value="">Seleccione una cita</option>

                @foreach($citas as $cita)
                    <option value="{{ $cita->ID_Cita }}"
                        @selected($nota->ID_Cita == $cita->ID_Cita)>
                        Cita #{{ $cita->ID_Cita }} –
                        {{ $cita->paciente->Nombre ?? 'Sin paciente' }}
                        {{ $cita->paciente->Apellidos ?? '' }}
                        ({{ $cita->Dia }} {{ $cita->Hora }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- DIAGNÓSTICO --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Diagnóstico
            </label>
            <select name="ID_Diagnostico" required
                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                <option value="">Seleccione un diagnóstico</option>

                @foreach($diagnosticos as $d)
                    <option value="{{ $d->ID_Diagnostico }}"
                        @selected($nota->ID_Diagnostico == $d->ID_Diagnostico)>
                        Dr. {{ $d->Doctor }} –
                        {{ $d->paciente->Nombre ?? 'Paciente' }}
                        {{ $d->paciente->Apellidos ?? '' }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- TRATAMIENTO --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Tratamiento
            </label>
            <select name="ID_Tratamiento" required
                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                <option value="">Seleccione un tratamiento</option>

                @foreach($tratamientos as $t)
                    <option value="{{ $t->ID_Tratamiento }}"
                        @selected($nota->ID_Tratamiento == $t->ID_Tratamiento)>
                        {{ $t->medicamento->Nombre ?? 'Medicamento' }} –
                        {{ $t->Via_Admin }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- BOTONES --}}
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('notamedica.index') }}"
               class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500">
                Cancelar
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">
                Actualizar
            </button>
        </div>

    </form>

</div>

@endsection
