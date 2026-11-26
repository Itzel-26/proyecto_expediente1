<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catalogo_medicamentos', function (Blueprint $table) {
            $table->id('ID_Medicamento');
            $table->string('Nombre', 255);
            $table->string('Tipo_presentacion', 255);
            $table->string('Via_administracion', 255); // Nuevo campo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogo_medicamentos');
    }
};
