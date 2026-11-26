<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nota_medica', function (Blueprint $table) {
            
            // Clave primaria
            $table->id('ID_Nota');

            // Llaves foráneas
            $table->unsignedBigInteger('ID_Cita');           
            $table->unsignedBigInteger('ID_Diagnostico')->nullable();
            $table->unsignedBigInteger('ID_Medicamento')->nullable(); // ← reemplazo correcto

            // Datos adicionales
            $table->date('Fecha')->nullable();

            // Relaciones
            $table->foreign('ID_Cita')
                ->references('ID_Cita')
                ->on('cita')
                ->onDelete('cascade');

            $table->foreign('ID_Diagnostico')
                ->references('ID_Diagnostico')
                ->on('diagnostico')
                ->onDelete('set null');

            // Nueva relación con catálogo de medicamentos
            $table->foreign('ID_Medicamento')
                ->references('ID_Medicamento')
                ->on('catalogo_medicamentos')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nota_medica');
    }
};
