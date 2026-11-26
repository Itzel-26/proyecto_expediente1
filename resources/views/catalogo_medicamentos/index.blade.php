@extends('components.layouts.app')

@section('title', 'Catálogo de Medicamentos')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        {{-- Botón agregar --}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('catalogo_medicamentos.create') }}"
               class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 text-sm font-medium">
                + Agregar medicamento
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">ID Medicamento</th>
                        <th class="px-4 py-2 border">Nombre</th>
                        <th class="px-4 py-2 border">Tipo de presentación</th>
                        <th class="px-4 py-2 border">Vía de administración</th> {{-- Nueva columna --}}
                        <th class="px-4 py-2 border text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach($medicamentos as $medicamento)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">
                            {{ $medicamento->ID_Medicamento }}
                        </td>

                        <td class="px-4 py-2 border">
                            {{ $medicamento->Nombre }}
                        </td>

                        <td class="px-4 py-2 border">
                            {{ $medicamento->Tipo_presentacion }}
                        </td>

                        <td class="px-4 py-2 border">
                            {{ $medicamento->Via_administracion }} {{-- Nuevo campo --}}
                        </td>

                        <td class="px-4 py-2 border text-center">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('catalogo_medicamentos.edit', $medicamento) }}"
                                   class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-xs">
                                    Editar
                                </a>

                                <form action="{{ route('catalogo_medicamentos.destroy', $medicamento) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Eliminar medicamento?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs">
                                        Eliminar
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection
