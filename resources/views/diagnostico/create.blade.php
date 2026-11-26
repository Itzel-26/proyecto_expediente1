@extends('components.layouts.app')

@section('title', 'Registrar Diagnóstico')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-lg shadow p-6">

        <form action="{{ route('diagnostico.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Paciente --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Paciente (ID Seguro)
                </label>
                <select name="ID_No_Seguro"
                        required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="">-- Seleccione paciente --</option>
                    @foreach($pacientes as $pac)
                        <option value="{{ $pac->ID_No_Seguro }}">
                            {{ $pac->ID_No_Seguro }} — {{ $pac->Nombre }} {{ $pac->Apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Signos Vitales --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Signos Vitales (registro)
                </label>
                <select name="ID_Signos_Vitales"
                        required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="">-- Seleccione registro de signos --</option>
                    @foreach($signosvitales as $sv)
                        <option value="{{ $sv->ID_Signos_Vitales }}">
                            {{ $sv->ID_Signos_Vitales }}-
                            {{ $sv->ID_No_Seguro }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Doctor --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Doctor (Cédula)
                </label>
                <select name="Doctor"
                        required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="">-- Seleccione doctor --</option>
                    @foreach($personal as $doc)
                        <option value="{{ $doc->Cedula }}">
                            {{ $doc->Cedula }} — {{ $doc->Nombre }} {{ $doc->Apellidos }}- {{ $doc->Especialidad }}
                        </option>
                    @endforeach
                </select>
            </div>

          

            {{-- Medicamento --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Medicamento
                </label>
                <select name="ID_Medicamento"
                        required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="">-- Seleccione medicamento --</option>
                    @foreach($medicamentos as $m)
                        <option value="{{ $m->ID_Medicamento }}">
                            {{ $m->Nombre }} — {{ $m->Tipo_presentacion }}- {{ $m->Via_administracion }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Observaciones --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Observaciones
                </label>
                <textarea name="Observaciones"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                    rows="3"
                    placeholder="Escriba observaciones generales..."></textarea>
            </div>

            {{-- Indicaciones --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Indicaciones del medicamento
                </label>
                <textarea name="Indicaciones"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                    rows="3"
                    placeholder="Indique dosis, horarios, recomendaciones..."></textarea>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('diagnostico.index') }}"
                   class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100 text-sm">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-5 py-2 rounded-md bg-purple-600 text-white hover:bg-purple-700 text-sm font-medium">
                    Guardar diagnóstico
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
