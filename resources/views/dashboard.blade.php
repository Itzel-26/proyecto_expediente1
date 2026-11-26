<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Clínica</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .sidebar {
            width: 230px;
        }
    </style>
</head>

<body class="bg-gray-100">

    {{-- Contenedor principal --}}
    <div class="flex">

        {{-- Sidebar --}}
        <aside class="sidebar bg-white h-screen shadow-md fixed">
            @include('components.layouts.app.sidebar')
        </aside>


        {{-- Contenido principal --}}
        <main class="ml-[230px] w-full">

            {{-- Navbar superior --}}
            <header class="bg-white shadow-md h-16 flex items-center justify-between px-6">

                <h2 class="text-xl font-semibold">Dashboard</h2>

                {{-- Usuario + Logout --}}
                <div class="flex items-center gap-4">

                    {{-- Nombre del usuario --}}
                    <span class="font-medium text-gray-600">
                        {{ Auth::user()->name }}
                    </span>

                    {{-- Avatar dinámico con ui-avatars --}}
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6C63FF&color=fff&bold=true"
                        alt="avatar"
                        class="w-10 h-10 rounded-full shadow">

                    {{-- Botón de logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-600 hover:underline">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </header>

            {{-- CONTENIDO DE LA PÁGINA --}}
            <div class="p-6">
                <div class="flex min-h-[calc(100vh-7rem)] flex-col items-center justify-center gap-4 text-center">
                    <img src="{{ asset('img/logomedicina.png') }}" alt="Logo de Medicina"
                         class="h-auto w-28 max-w-full sm:w-36">
                    <h1 class="text-2xl font-bold text-purple-700 sm:text-3xl">
                        Bienvenidos al Sistema de Citas Médicas
                    </h1>
                </div>
                @yield('content')
            </div>

        </main>

    </div>

</body>
</html>
