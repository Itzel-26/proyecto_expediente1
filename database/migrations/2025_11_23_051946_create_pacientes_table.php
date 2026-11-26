<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('ID_No_Seguro'); // PK

            $table->string('Nombre');
            $table->string('Apellidos');
            $table->integer('Edad');
            $table->string('Telefono')->nullable();
            $table->enum('Sexo', ['M', 'F']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
