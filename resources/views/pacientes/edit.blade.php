@extends('components.layouts.app')

@section('title', 'Editar Paciente')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <form action="{{ route('pacientes.update', $paciente->ID_No_Seguro) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- No. Seguro (solo lectura) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        No. Seguro
                    </label>
                    <input type="number"
                           class="w-full bg-gray-100 border-gray-300 rounded-md shadow-sm"
                           value="{{ $paciente->ID_No_Seguro }}"
                           disabled>
                </div>

                {{-- Edad --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Edad
                    </label>
                    <input type="number"
                           name="Edad"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                           value="{{ old('Edad', $paciente->Edad) }}"
                           required>
                </div>

                {{-- Nombre --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nombre
                    </label>
                    <input type="text"
                           name="Nombre"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                           value="{{ old('Nombre', $paciente->Nombre) }}"
                           required>
                </div>

                {{-- Apellidos --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Apellidos
                    </label>
                    <input type="text"
                           name="Apellidos"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                           value="{{ old('Apellidos', $paciente->Apellidos) }}"
                           required>
                </div>

                {{-- Teléfono --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Teléfono
                    </label>
                    <input type="text"
                           name="Telefono"
                           class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                           value="{{ old('Telefono', $paciente->Telefono) }}">
                </div>

                {{-- Sexo --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Sexo
                    </label>
                    <select name="Sexo"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                            required>
                        <option value="M" {{ $paciente->Sexo == 'M' ? 'selected' : '' }}>
                            Masculino
                        </option>
                        <option value="F" {{ $paciente->Sexo == 'F' ? 'selected' : '' }}>
                            Femenino
                        </option>
                    </select>
                </div>

            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('pacientes.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 text-sm">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 text-sm">
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
