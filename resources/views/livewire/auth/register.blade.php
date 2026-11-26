<x-layouts.auth>

    <div class="flex flex-col gap-6">

        {{-- Encabezado personalizado --}}
        <div class="text-center flex flex-col items-center gap-2">
            <div class="bg-purple-200 p-4 rounded-full shadow-md">
                <i class="fa-solid fa-user-plus text-purple-700 text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-purple-700">
                {{ __('Crea tu cuenta médica') }}
            </h2>
            <p class="text-purple-500">
                {{ __('Registra tus datos para agendar y consultar tus citas') }}
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" 
              action="{{ route('register.store') }}" 
              class="flex flex-col gap-6 bg-purple-50 p-6 rounded-xl shadow-md">

            @csrf

            <!-- Name -->
            <flux:input
                name="name"
                :label="__('Nombre completo')"
                type="text"
                required
                autofocus
                autocomplete="name"
                placeholder="Juan Pérez"
                class="focus:ring-purple-600"
            />

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Correo electrónico')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
                class="focus:ring-purple-600"
            />

            <!-- Password -->
            <flux:input
                name="password"
                :label="__('Contraseña')"
                type="password"
                required
                autocomplete="new-password"
                placeholder="••••••••"
                viewable
                class="focus:ring-purple-600"
            />

            <!-- Confirm Password -->
            <flux:input
                name="password_confirmation"
                :label="__('Confirmar contraseña')"
                type="password"
                required
                autocomplete="new-password"
                placeholder="••••••••"
                viewable
                class="focus:ring-purple-600"
            />

            <div class="flex items-center justify-end">
                <flux:button 
                    type="submit" 
                    variant="primary" 
                    class="w-full bg-purple-700 hover:bg-purple-800 text-white"
                    data-test="register-user-button">
                    {{ __('Crear cuenta') }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-purple-700">
            <span>{{ __('¿Ya tienes una cuenta?') }}</span>
            <flux:link 
                :href="route('login')" 
                wire:navigate
                class="text-purple-900 font-semibold hover:underline">
                {{ __('Inicia sesión') }}
            </flux:link>
        </div>
    </div>

</x-layouts.auth>
