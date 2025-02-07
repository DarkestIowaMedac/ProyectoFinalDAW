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
        Schema::create('calidades', function (Blueprint $table) {
            // Campos genéricos
            $table->id(); // PK
            $table->timestamps();

            // Campos añadidos
            $table->unsignedBigInteger('idTipoEstudio');
            $table->foreign('idTipoEstudio')
                  ->references('id')
                  ->on('calidades')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK

            $table->string('nombre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calidades');
    }
};
