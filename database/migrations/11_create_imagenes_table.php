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
        Schema::create('imagenes', function (Blueprint $table) {
            // Campos genéricos
            $table->id(); // PK
            $table->timestamps();

            // Campos añadidos
            $table->unsignedBigInteger('idMuestra');
            $table->foreign('idMuestra')
                  ->references('id')
                  ->on('muestras')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK

            $table->string('ruta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
