@php
    $user = Auth::user();
    $initial = strtoupper(substr($user->name, 0, 1));
@endphp

<div class="h-full flex flex-col text-gray-700">

    {{-- Logo --}}
    <div class="p-5 border-b border-gray-200 flex items-center space-x-3">
        <span class="text-2xl font-bold text-purple-700">Clínica</span>
    </div>

    {{-- Menú --}}
    <nav class="flex-1 p-4 space-y-1">

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                  {{ request()->routeIs('dashboard') ? 'bg-purple-200 font-semibold' : '' }}">
            <i class="fa-solid fa-house text-purple-700"></i>
            Dashboard
        </a>

        @if($user->rol === 'admin')
            <a href="{{ route('catalogo_medicamentos.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('catalogo_medicamentos.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Catálogo Medicamentos
            </a>
        @endif

        @if($user->rol === 'enfermera')
            <a href="{{ route('cita.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('cita.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Cita
            </a>
        @endif

        @if($user->rol === 'doctor')
            <a href="{{ route('diagnostico.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('diagnostico.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Diagnóstico
            </a>
        @endif

        @if($user->rol === 'admin' )
            <a href="{{ route('especialidades.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('especialidades.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Especialidad
            </a>
        @endif

        @if($user->rol === 'doctor')
            <a href="{{ route('historial.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('historial.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Nota Médica
            </a>
        @endif

        @if($user->rol === 'enfermera' || $user->rol === 'doctor')
            <a href="{{ route('pacientes.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('pacientes.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Pacientes
            </a>
        @endif

        @if($user->rol === 'admin' )
            <a href="{{ route('personal.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('personal.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Personal
            </a>
        @endif

        @if($user->rol === 'admin' )
            <a href="{{ route('roles.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('roles.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Roles
            </a>
        @endif

        @if($user->rol === 'doctor'|| $user->rol === 'enfermera')
            <a href="{{ route('signosvitales.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-purple-100 
                       {{ request()->routeIs('signosvitales.*') ? 'bg-purple-200 font-semibold' : '' }}">
                <i class="fa-solid fa-pills text-purple-700"></i>
                Signos Vitales
            </a>
        @endif

    </nav>

    {{-- Usuario abajo --}}
    <div class="border-t border-gray-200 p-4">
        <div class="flex items-center gap-3">

            <div class="h-10 w-10 bg-purple-600 text-white rounded-full flex items-center justify-center">
                {{ $initial }}
            </div>

            <div class="flex-1">
                <p class="font-semibold">{{ $user->name }}</p>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
            </div>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button title="Salir">
                    <i class="fa-solid fa-right-from-bracket text-red-500 hover:text-red-700"></i>
                </button>
            </form>
        </div>
    </div>

</div>
