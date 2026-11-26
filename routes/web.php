<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
// Controladores
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\SignosVitalesController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\NotaMedicaController;
use App\Http\Controllers\CatalogoMedicamentosController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController; // <-- Rutas de usuarios
use App\Http\Controllers\HistorialController;

Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index');


// --------------------------------------------------------------
// RUTA DE INICIO
// --------------------------------------------------------------


Route::get('/', function () {
    return view('welcome');
})->name('home');


// --------------------------------------------------------------
// RUTAS PERFILES SI
// --------------------------------------------------------------
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::get('/perfil/create', [PerfilController::class, 'create'])->name('perfil.create');
Route::post('/perfil', [PerfilController::class, 'store'])->name('perfil.store');
Route::get('/perfil/{perfil}/edit', [PerfilController::class, 'edit'])->name('perfil.edit');
Route::put('/perfil/{perfil}', [PerfilController::class, 'update'])->name('perfil.update');
Route::delete('/perfil/{perfil}', [PerfilController::class, 'destroy'])->name('perfil.destroy');

// --------------------------------------------------------------
// RUTAS PACIENTE SI
// --------------------------------------------------------------
Route::get('/paciente', [PacienteController::class, 'index'])->name('pacientes.index');
Route::get('/paciente/create', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/paciente', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('/paciente/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('/paciente/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::delete('/paciente/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

// --------------------------------------------------------------
// RUTAS PERSONAL SI
// --------------------------------------------------------------
Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
Route::get('/personal/create', [PersonalController::class, 'create'])->name('personal.create');
Route::post('/personal', [PersonalController::class, 'store'])->name('personal.store');
Route::get('/personal/{personal}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
Route::put('/personal/{personal}', [PersonalController::class, 'update'])->name('personal.update');
Route::delete('/personal/{personal}', [PersonalController::class, 'destroy'])->name('personal.destroy');

// --------------------------------------------------------------
// RUTAS ESPECIALIDAD SI
// --------------------------------------------------------------
Route::get('/especialidad', [EspecialidadController::class, 'index'])->name('especialidades.index');
Route::get('/especialidad/create', [EspecialidadController::class, 'create'])->name('especialidades.create');
Route::post('/especialidad', [EspecialidadController::class, 'store'])->name('especialidades.store');
Route::get('/especialidad/{especialidad}/edit', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
Route::put('/especialidad/{especialidad}', [EspecialidadController::class, 'update'])->name('especialidades.update');
Route::delete('/especialidad/{especialidad}', [EspecialidadController::class, 'destroy'])->name('especialidades.destroy');

// --------------------------------------------------------------
// RUTAS SIGNOS VITALES SI  
// --------------------------------------------------------------
Route::get('/signosvitales', [SignosVitalesController::class, 'index'])->name('signosvitales.index');
Route::get('/signosvitales/create', [SignosVitalesController::class, 'create'])->name('signosvitales.create');
Route::post('/signosvitales', [SignosVitalesController::class, 'store'])->name('signosvitales.store');
Route::get('/signosvitales/{id}/edit', [SignosVitalesController::class, 'edit'])->name('signosvitales.edit');
Route::put('/signosvitales/{id}', [SignosVitalesController::class, 'update'])->name('signosvitales.update');
Route::delete('/signosvitales/{id}', [SignosVitalesController::class, 'destroy'])->name('signosvitales.destroy');

// --------------------------------------------------------------
// RUTAS TRATAMIENTO SI 
// --------------------------------------------------------------
Route::get('/tratamiento', [TratamientoController::class, 'index'])->name('tratamiento.index');
Route::get('/tratamiento/create', [TratamientoController::class, 'create'])->name('tratamiento.create');
Route::post('/tratamiento', [TratamientoController::class, 'store'])->name('tratamiento.store');
Route::get('/tratamiento/{tratamiento}/edit', [TratamientoController::class, 'edit'])->name('tratamiento.edit');
Route::put('/tratamiento/{tratamiento}', [TratamientoController::class, 'update'])->name('tratamiento.update');
Route::delete('/tratamiento/{tratamiento}', [TratamientoController::class, 'destroy'])->name('tratamiento.destroy');

// --------------------------------------------------------------
// RUTAS DIAGNOSTICO SI
// --------------------------------------------------------------
Route::get('/diagnostico', [DiagnosticoController::class, 'index'])->name('diagnostico.index');
Route::get('/diagnostico/create', [DiagnosticoController::class, 'create'])->name('diagnostico.create');
Route::post('/diagnostico', [DiagnosticoController::class, 'store'])->name('diagnostico.store');
Route::get('/diagnostico/{diagnostico}/edit', [DiagnosticoController::class, 'edit'])->name('diagnostico.edit');
Route::put('/diagnostico/{diagnostico}', [DiagnosticoController::class, 'update'])->name('diagnostico.update');
Route::delete('/diagnostico/{diagnostico}', [DiagnosticoController::class, 'destroy'])->name('diagnostico.destroy');

// --------------------------------------------------------------
// RUTAS CITA  SI
// --------------------------------------------------------------
Route::get('/cita', [CitaController::class, 'index'])->name('cita.index');
Route::get('/cita/create', [CitaController::class, 'create'])->name('cita.create');
Route::post('/cita', [CitaController::class, 'store'])->name('cita.store');
Route::get('/cita/{id}/edit', [CitaController::class, 'edit'])->name('cita.edit');
Route::put('/cita/{id}', [CitaController::class, 'update'])->name('cita.update');


// --------------------------------------------------------------
// RUTAS NOTA MÉDICA SI
// --------------------------------------------------------------
Route::get('/notamedica', [NotaMedicaController::class, 'index'])->name('notamedica.index');
Route::get('/notamedica/create', [NotaMedicaController::class, 'create'])->name('notamedica.create');
Route::post('/notamedica', [NotaMedicaController::class, 'store'])->name('notamedica.store');
Route::get('/notamedica/{id}/edit', [NotaMedicaController::class, 'edit'])->name('notamedica.edit');
Route::put('/notamedica/{id}', [NotaMedicaController::class, 'update'])->name('notamedica.update');
Route::delete('/notamedica/{id}', [NotaMedicaController::class, 'destroy'])->name('notamedica.destroy');
// --------------------------------------------------------------
// RUTAS CATALOGO MEDICAMENTOS SI
// --------------------------------------------------------------
Route::get('/catalogo_medicamentos', [CatalogoMedicamentosController::class, 'index'])->name('catalogo_medicamentos.index');
Route::get('/catalogo_medicamentos/create', [CatalogoMedicamentosController::class, 'create'])->name('catalogo_medicamentos.create');
Route::post('/catalogo_medicamentos', [CatalogoMedicamentosController::class, 'store'])->name('catalogo_medicamentos.store');
Route::get('/catalogo_medicamentos/{catalogo_medicamento}/edit', [CatalogoMedicamentosController::class, 'edit'])->name('catalogo_medicamentos.edit');
Route::put('/catalogo_medicamentos/{catalogo_medicamento}', [CatalogoMedicamentosController::class, 'update'])->name('catalogo_medicamentos.update');
Route::delete('/catalogo_medicamentos/{catalogo_medicamento}', [CatalogoMedicamentosController::class, 'destroy'])->name('catalogo_medicamentos.destroy');

// --------------------------------------------------------------
// RUTAS ROLES SI
// --------------------------------------------------------------
Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RolController::class, 'create'])->name('roles.create');
Route::post('/roles', [RolController::class, 'store'])->name('roles.store');
Route::get('/roles/{rol}/edit', [RolController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{rol}', [RolController::class, 'update'])->name('roles.update');
Route::delete('/roles/{rol}', [RolController::class, 'destroy'])->name('roles.destroy');

// --------------------------------------------------------------
// RUTAS USUARIOS NO
// --------------------------------------------------------------
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');             // listado
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');     // formulario crear
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');             // guardar
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');      // editar
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');       // actualizar
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');  // eliminar

// --------------------------------------------------------------
// FIN
// --------------------------------------------------------------







Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
