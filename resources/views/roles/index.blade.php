@extends('components.layouts.app')

@section('title', 'Listado de Roles')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- Botón Crear --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('roles.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Crear Rol
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden text-sm text-gray-600">

                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Cédula</th>
                        <th class="px-4 py-3 text-left">Rol</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($roles as $rol)
                    <tr class="hover:bg-gray-50">

                        <td class="px-4 py-3">{{ $rol->cedula }}</td>

                        <td class="px-4 py-3">
                            @if($rol->administrador) Administrador @endif
                            @if($rol->enfermera) Enfermera @endif
                            @if($rol->doctor) Doctor @endif
                        </td>

                        <td class="px-4 py-3 text-center flex justify-center gap-2">

                            <a href="{{ route('roles.edit', $rol) }}"
                               class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded text-xs font-medium">
                                Editar
                            </a>

                            <form action="{{ route('roles.destroy', $rol) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar rol?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-xs font-medium">
                                    Eliminar
                                </button>
                            </form>

                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                            No hay roles registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
