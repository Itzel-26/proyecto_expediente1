<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->id('ID_Perfil');
            $table->unsignedBigInteger('ID_Usuario');
            $table->string('Usuario');
            $table->string('Contraseña');

            // FK
            $table->foreign('ID_Usuario')
                  ->references('ID_Usuario')
                  ->on('usuarios')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil');
    }
};
