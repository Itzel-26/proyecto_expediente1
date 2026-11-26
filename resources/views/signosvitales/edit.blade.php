@extends('components.layouts.app')
@section('title', 'Editar Signos Vitales')
@section('content')

<div class="max-w-3xl mx-auto mt-6">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-xl font-semibold text-gray-800 mb-6">Editar Signos Vitales</h2>

        <form action="{{ route('signosvitales.update', $signo->ID_Signos_Vitales) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Paciente --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">No. de Seguro del Paciente</label>
                <input type="number" name="ID_No_Seguro" value="{{ $signo->ID_No_Seguro }}" 
                       class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Personal --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Cédula del Personal</label>
                <input type="text" name="Cedula" value="{{ $signo->Cedula }}" 
                       class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Presión --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Presión</label>
                <input type="text" name="Presion" value="{{ $signo->Presion }}" 
                       class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Altura --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Altura</label>
                <input type="text" name="Altura" value="{{ $signo->Altura }}" 
                       class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Temperatura --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Temperatura</label>
                <input type="number" step="0.1" name="Temperatura" value="{{ $signo->Temperatura }}" 
                       class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Peso --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Peso</label>
                <input type="number" step="0.1" name="Peso" value="{{ $signo->Peso }}" 
                       class="form-control w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3 mt-4">
                <a href="{{ route('signosvitales.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
