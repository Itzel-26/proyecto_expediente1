<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('ID_Usuario'); // AUTO_INCREMENT
            $table->string('Cedula')->nullable();
            $table->string('Tipo_Usuario', 50)->nullable();
            $table->unsignedBigInteger('ID_No_Seguro')->nullable();

            // Relaciones
            $table->foreign('Cedula')
                  ->references('Cedula')->on('personal')
                  ->onDelete('set null');

            $table->foreign('ID_No_Seguro')
                  ->references('ID_No_Seguro')->on('pacientes')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
