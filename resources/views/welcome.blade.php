<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Citas Médicas</title>

    @vite('resources/css/app.css')

    <!-- ICONOS -->
    <script src="https://kit.fontawesome.com/a2d9d6c5b5.js" crossorigin="anonymous"></script>

    <style>
        /* FONDO */
        .gradient-bg {
            background: linear-gradient(135deg, #6d28d9, #a78bfa);
        }

        /* TARJETA GLASS */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(14px);
        }

        /* LOGO */
        .logo-container {
            width: 140px;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container img {
            height: 120px;
            width: auto;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.25));
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center gradient-bg p-6">

    <!-- TARJETA -->
    <div class="max-w-md w-full rounded-3xl glass shadow-2xl border border-white/30 p-6 text-white">

        <div class="flex flex-col items-center gap-6 text-center">

            <!-- LOGO -->
            <div class="logo-container">
                <img src="{{ asset('img/logomedicina.png') }}" alt="Logo Medicina">
            </div>

            <!-- TEXTO -->
            <h1 class="text-3xl font-bold leading-tight">
                Bienvenido al Sistema de Citas Médicas
            </h1>

            <!-- BOTONES -->
            <div class="mt-4 flex flex-col sm:flex-row gap-4 w-full justify-center">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 bg-white text-purple-700 font-semibold rounded-xl shadow hover:bg-gray-100 transition text-center">
                        Iniciar sesión
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="px-6 py-3 border border-white/70 text-white font-semibold rounded-xl hover:bg-white/10 transition text-center">
                        Crear cuenta
                    </a>
                @endif
            </div>

        </div>

    </div>

</body>
</html>
