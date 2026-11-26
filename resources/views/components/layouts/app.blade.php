<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel - Clínica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    {{-- Sidebar --}}
    <aside class="sidebar bg-white h-screen shadow-md fixed w-[230px]">
        @include('components.layouts.app.sidebar')
    </aside>

    {{-- Contenido --}}
    <main class="ml-[230px] w-full">

        {{-- Navbar --}}
        <header class="bg-white shadow-md h-16 flex items-center relative px-6">

            {{-- Título centrado --}}
            <h2 class="text-xl font-semibold absolute left-1/2 -translate-x-1/2">
                @yield('title', 'Dashboard')
            </h2>

            {{-- Botón salir --}}
            <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                @csrf
                <button class="text-red-600">
                    Salir
                </button>
            </form>

        </header>

        {{-- CONTENIDO CAMBIANTE --}}
        <div class="p-6">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>
