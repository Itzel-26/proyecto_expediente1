<x-layouts.auth>

    <div class="flex flex-col gap-6">

        {{-- Encabezado personalizado para tema médico --}}
        <div class="text-center flex flex-col items-center gap-2">
            <div class="bg-purple-200 p-4 rounded-full shadow-md">
                <i class="fa-solid fa-stethoscope text-purple-700 text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-purple-700">
                {{ __('Inicia sesión para tu cita médica') }}
            </h2>
            <p class="text-purple-500">
                {{ __('Accede con tu correo y contraseña para continuar') }}
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" 
              class="flex flex-col gap-6 bg-purple-50 p-6 rounded-xl shadow-md">

            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Correo electrónico')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
                class="focus:ring-purple-600"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Contraseña')"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    viewable
                    class="focus:ring-purple-600"
                />

                @if (Route::has('password.request'))
                    <flux:link 
                        class="absolute top-0 text-sm end-0 text-purple-600 hover:underline" 
                        :href="route('password.request')" 
                        wire:navigate>
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox 
                name="remember" 
                :label="__('Recordarme')" 
                :checked="old('remember')" 
                class="text-purple-600"
            />

            <div class="flex items-center justify-end">
                <flux:button 
                    variant="primary" 
                    type="submit" 
                    class="w-full bg-purple-700 hover:bg-purple-800 text-white"
                    data-test="login-button">
                    {{ __('Iniciar sesión') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-purple-700">
                <span>{{ __('¿No tienes una cuenta?') }}</span>
                <flux:link 
                    :href="route('register')" 
                    wire:navigate
                    class="text-purple-900 font-semibold hover:underline">
                    {{ __('Regístrate') }}
                </flux:link>
            </div>
        @endif

    </div>

</x-layouts.auth>
