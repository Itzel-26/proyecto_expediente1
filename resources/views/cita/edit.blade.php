@extends('components.layouts.app')

@section('title', 'Editar Cita')

@section('content')

<div class="max-w-xl mx-auto">

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('cita.update', ['id' => $cita->ID_Cita, 'enfermera' => $cita->Enfermera]) }}"
              method="POST"
              class="space-y-4">

            @csrf
            @method('PUT')

            {{-- ID Cita --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    ID Cita
                </label>
                <input type="number" name="ID_Cita" value="{{ $cita->ID_Cita }}" readonly
                       class="w-full border rounded-md px-3 py-2 bg-gray-100">
            </div>

            {{-- Enfermera --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Enfermera (Cédula)
                </label>
                <select name="Enfermera" required
                        class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-purple-300">
                    @foreach($enfermeras as $e)
                        <option value="{{ $e->Cedula }}"
                            {{ $cita->Enfermera == $e->Cedula ? 'selected' : '' }}>
                            {{ $e->Cedula }} - {{ $e->Nombre }} {{ $e->Apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Especialidad --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Especialidad
                </label>
                <select name="ID_Especialidad" required
                        class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-purple-300">
                    @foreach($especialidades as $e)
                        <option value="{{ $e->ID_Especialidad }}"
                            {{ $cita->ID_Especialidad == $e->ID_Especialidad ? 'selected' : '' }}>
                            {{ $e->ID_Especialidad }} - {{ $e->Tipo_Especialidad }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Paciente --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Paciente
                </label>
                <select name="ID_No_Seguro" required
                        class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-purple-300">
                    @foreach($pacientes as $p)
                        <option value="{{ $p->ID_No_Seguro }}"
                            {{ $cita->ID_No_Seguro == $p->ID_No_Seguro ? 'selected' : '' }}>
                            {{ $p->ID_No_Seguro }} - {{ $p->Nombre }} {{ $p->Apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Día --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Día
                </label>
                <input type="date" name="Dia" value="{{ $cita->Dia }}" required
                       class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-purple-300">
            </div>

            {{-- Hora --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Hora
                </label>
                <input type="time" name="Hora" value="{{ $cita->Hora }}" required
                       class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-purple-300">
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('cita.index') }}"
                   class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 text-sm">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 text-sm">
                    Guardar Cambios
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
