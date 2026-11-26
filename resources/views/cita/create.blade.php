@extends('components.layouts.app')

@section('title', 'Crear Cita')

@section('content')

<div class="max-w-xl mx-auto">

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('cita.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Enfermera --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Enfermera (Cédula)
                </label>
                <select name="Enfermera" required
                        class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-purple-300">
                    <option value="">Seleccione una enfermera</option>
                    @foreach($enfermeras as $e)
                        <option value="{{ $e->Cedula }}">
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
                    <option value="">Seleccione una especialidad</option>
                    @foreach($especialidades as $e)
                        <option value="{{ $e->ID_Especialidad }}">
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
                    <option value="">Seleccione un paciente</option>
                    @foreach($pacientes as $p)
                        <option value="{{ $p->ID_No_Seguro }}">
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
                <input type="date" name="Dia" required
                       class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-purple-300">
            </div>

            {{-- Hora --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Hora
                </label>
                <input type="time" name="Hora" required
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
                    Guardar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
