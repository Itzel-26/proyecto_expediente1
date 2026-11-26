<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('signosvitales', function (Blueprint $table) {
            $table->id('ID_Signos_Vitales');     
            $table->unsignedBigInteger('ID_No_Seguro'); 
            $table->string('Cedula');             
            $table->string('Presion');
            $table->string('Altura');
            $table->string('Temperatura');
            $table->string('Peso');

            $table->foreign('ID_No_Seguro')
                ->references('ID_No_Seguro')->on('pacientes')
                ->onDelete('cascade');

            $table->foreign('Cedula')
                ->references('Cedula')->on('personal')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('signosvitales');
    }
};
