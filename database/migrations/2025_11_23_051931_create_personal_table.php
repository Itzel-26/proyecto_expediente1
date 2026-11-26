<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->string('Cedula', 20)->primary();
            $table->string('Nombre', 50);
            $table->string('Apellidos', 80);
            $table->unsignedBigInteger('ID_Especialidad');
            $table->string('RFC', 13);
            $table->string('Telefono', 15);
            $table->string('Correo', 100);
            $table->enum('Sexo', ['M', 'F']);

            $table->foreign('ID_Especialidad')->references('ID_Especialidad')->on('especialidades')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal');
    }
};
