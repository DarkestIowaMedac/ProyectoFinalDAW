<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('muestras', function (Blueprint $table) {
            // Campos genéricos
            $table->id(); // PK
            $table->timestamps();

            // Campos añadidos
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK            

            $table->unsignedBigInteger('idFormato');
            $table->foreign('idFormato')
                  ->references('id')
                  ->on('formatos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK

            $table->unsignedBigInteger('idSede');
            $table->foreign('idSede')
                  ->references('id')
                  ->on('sedes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK

            $table->unsignedBigInteger('idNaturaleza');
            $table->foreign('idNaturaleza')
                  ->references('id')
                  ->on('naturalezas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK

            $table->unsignedBigInteger('idCalidad');
            $table->foreign('idCalidad')
                  ->references('id')
                  ->on('calidades')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK

            $table->string('codigo')->unique();
            $table->date('fecha');
            $table->string('organo')->nullable(); // Permite que el campo organo sea null
            $table->text('descripcionCalidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muestras');
    }
};
