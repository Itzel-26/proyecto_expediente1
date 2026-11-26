@extends('components.layouts.app')

@section('title', 'Registrar Personal')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- TÍTULO --}}
        <h2 class="text-xl font-semibold text-gray-800 mb-6">
            Registrar Personal
        </h2>

        <form action="{{ route('personal.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- CÉDULA --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Cédula</label>
                <input type="text" name="Cedula"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300"
                    required>
            </div>

            {{-- NOMBRE --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="Nombre"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300"
                    required>
            </div>

            {{-- APELLIDOS --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" name="Apellidos"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300"
                    required>
            </div>

            {{-- ESPECIALIDAD --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Especialidad</label>
                <select name="ID_Especialidad"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300"
                    required>
                    <option value="">Seleccione</option>
                    @foreach($especialidades as $e)
                        <option value="{{ $e->ID_Especialidad }}">
                            {{ $e->Tipo_Especialidad }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- RFC --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">RFC</label>
                <input type="text" name="RFC"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300"
                    required>
            </div>

            {{-- TELÉFONO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" name="Telefono"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300"
                    required>
            </div>

            {{-- CORREO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" name="Correo"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300"
                    required>
            </div>

            {{-- SEXO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Sexo</label>
                <select name="Sexo"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-purple-300"
                    required>
                    <option value="">Seleccione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
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
                    Guardar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
