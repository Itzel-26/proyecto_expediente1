@extends('components.layouts.app')
@section('title', 'Registrar Signos Vitales')
@section('content')

<div class="max-w-3xl mx-auto mt-6">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-xl font-semibold text-gray-800 mb-6">Registrar Signos Vitales</h2>

        <form action="{{ route('signosvitales.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Paciente --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">No. de Seguro del Paciente</label>
                <select name="ID_No_Seguro" class="form-select w-full border-gray-300 rounded-lg" required>
                    <option value="">Seleccione...</option>
                    @foreach($pacientes as $p)
                        <option value="{{ $p->ID_No_Seguro }}">
                            {{ $p->ID_No_Seguro }} - {{ $p->Nombre }} {{ $p->Apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Personal --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Cédula del Personal</label>
                <select name="Cedula" class="form-select w-full border-gray-300 rounded-lg" required>
                    <option value="">Seleccione...</option>
                    @foreach($personal as $per)
                        <option value="{{ $per->Cedula }}">
                            {{ $per->Cedula }} - {{ $per->Nombre }} {{ $per->Apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Presión --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Presión</label>
                <input type="text" name="Presion" class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Altura --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Altura</label>
                <input type="text" name="Altura" class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Temperatura --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Temperatura</label>
                <input type="number" step="0.1" name="Temperatura" class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Peso --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Peso</label>
                <input type="number" step="0.1" name="Peso" class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3 mt-4">
                <a href="{{ route('signosvitales.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                    Guardar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
