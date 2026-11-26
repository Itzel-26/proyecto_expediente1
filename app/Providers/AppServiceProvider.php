<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::policy(CatalogoMedicamentos::class, CatalogoMedicamentosPolicy::class);
        Gate::policy(Cita::class, CitaPolicy::class);
        Gate::policy(Diagnostico::class, DiagnosticoPolicy::class);
        Gate::policy(Especialidad::class, EspecialidadPolicy::class);
        Gate::policy(NotaMedica::class, NotaMedicaPolicy::class);
        Gate::policy(Paciente::class, PacientePolicy::class);
        Gate::policy(Perfil::class, PerfilPolicy::class);
        Gate::policy(Personal::class, PersonalPolicy::class);
        Gate::policy(Rol::class, RolPolicy::class);
        Gate::policy(SignosVitales::class, SignosVitalesPolicy::class);
        Gate::policy(Tratamiento::class, TratamientoPolicy::class);
        Gate::policy(Usuario::class, UsuarioPolicy::class);
    }
}
