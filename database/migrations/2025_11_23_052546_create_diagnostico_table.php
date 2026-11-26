<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnostico', function (Blueprint $table) {

            $table->id('ID_Diagnostico');

            $table->string('Doctor', 20); // Cedula del doctor
            $table->unsignedBigInteger('ID_No_Seguro'); // FK paciente
            $table->unsignedBigInteger('ID_Signos_Vitales'); // FK signos vitales

            // NUEVOS CAMPOS
            $table->text('Observaciones')->nullable();

            // CAMBIO: antes era ID_Tratamiento → ahora ID_Medicamento
            $table->unsignedBigInteger('ID_Medicamento'); // FK medicamento

            $table->text('Indicaciones')->nullable(); // instrucciones para el medicamento

            $table->timestamps();

            // FK a personal
            $table->foreign('Doctor')
                ->references('Cedula')
                ->on('personal')
                ->onDelete('cascade');

            // FK paciente
            $table->foreign('ID_No_Seguro')
                ->references('ID_No_Seguro')
                ->on('pacientes')
                ->onDelete('cascade');

            // FK signos vitales
            $table->foreign('ID_Signos_Vitales')
                ->references('ID_Signos_Vitales')
                ->on('signosvitales')
                ->onDelete('cascade');

            // NUEVA FK medicamento
            $table->foreign('ID_Medicamento')
                ->references('ID_Medicamento')
                ->on('catalogo_medicamentos')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnostico');
    }
};
