@extends('components.layouts.app')

@section('title', 'Editar Personal')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- TÍTULO --}}
        <h2 class="text-xl font-semibold text-gray-800 mb-6">
            Editar Personal
        </h2>

        <form action="{{ route('personal.update', $personal->Cedula) }}"
              method="POST"
              class="space-y-4">
            @csrf
            @method('PUT')

            {{-- CÉDULA (SOLO LECTURA) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Cédula</label>
                <input type="text"
                       value="{{ $personal->Cedula }}"
                       disabled
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100">
            </div>

            {{-- NOMBRE --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text"
                       name="Nombre"
                       value="{{ $personal->Nombre }}"
                       required
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300">
            </div>

            {{-- APELLIDOS --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text"
                       name="Apellidos"
                       value="{{ $personal->Apellidos }}"
                       required
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300">
            </div>

            {{-- ESPECIALIDAD --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Especialidad</label>
                <select name="ID_Especialidad"
                        required
                        class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300">
                    @foreach($especialidades as $e)
                        <option value="{{ $e->ID_Especialidad }}"
                            {{ $personal->ID_Especialidad == $e->ID_Especialidad ? 'selected' : '' }}>
                            {{ $e->Tipo_Especialidad }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- RFC --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">RFC</label>
                <input type="text"
                       name="RFC"
                       value="{{ $personal->RFC }}"
                       required
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300">
            </div>

            {{-- TELÉFONO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text"
                       name="Telefono"
                       value="{{ $personal->Telefono }}"
                       required
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300">
            </div>

            {{-- CORREO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email"
                       name="Correo"
                       value="{{ $personal->Correo }}"
                       required
                       class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300">
            </div>

            {{-- SEXO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Sexo</label>
                <select name="Sexo"
                        required
                        class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300">
                    <option value="M" {{ $personal->Sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ $personal->Sexo == 'F' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>

            {{-- BOTONES --}}
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('personal.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
