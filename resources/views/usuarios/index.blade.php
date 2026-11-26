@extends('components.layouts.app')
@section('title', 'Listado de Usuarios')
@section('content')

<div class="max-w-7xl mx-auto mt-6">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- Botón Crear --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('usuarios.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Crear Usuario
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden text-sm">

                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left border">ID</th>
                        <th class="px-4 py-2 text-left border">Cédula Personal</th>
                        <th class="px-4 py-2 text-left border">Tipo Usuario</th>
                        <th class="px-4 py-2 text-left border">No. Seguro (Paciente)</th>
                        <th class="px-4 py-2 text-center border">Acciones</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 divide-y divide-gray-200">
                    @forelse($usuarios as $u)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $u->ID_Usuario }}</td>
                        <td class="px-4 py-2 border">{{ $u->Cedula ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $u->Tipo_Usuario }}</td>
                        <td class="px-4 py-2 border">{{ $u->ID_No_Seguro ?? 'N/A' }}</td>

                        <td class="px-4 py-2 border text-center space-y-2">
                            <a href="{{ route('usuarios.edit', $u) }}"
                               class="block px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 text-xs font-medium">
                                Editar
                            </a>

                            <form action="{{ route('usuarios.destroy', $u) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 text-xs font-medium">
                                    Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            No hay usuarios registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
