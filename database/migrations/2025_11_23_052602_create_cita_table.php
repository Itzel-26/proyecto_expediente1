<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->id('ID_Cita'); // auto increment

            $table->string('Enfermera');
            $table->unsignedBigInteger('ID_Especialidad');
            $table->unsignedBigInteger('ID_No_Seguro');
            $table->date('Dia');
            $table->time('Hora');

            $table->foreign('Enfermera')
                ->references('Cedula')
                ->on('personal');

            $table->foreign('ID_Especialidad')
                ->references('ID_Especialidad')
                ->on('especialidades');

            $table->foreign('ID_No_Seguro')
                ->references('ID_No_Seguro')
                ->on('pacientes');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('cita');
    }
};
