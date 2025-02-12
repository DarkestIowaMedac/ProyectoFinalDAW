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
        Schema::create('interpretacion_muestra', function (Blueprint $table) {
            // Campos genéricos
            $table->id(); // PK
            // $table->timestamps(); // Este campo no es necesario al ser ésta una tabla pivote

            // Campos añadidos
            $table->unsignedBigInteger('idInterpretacion');
            $table->foreign('idInterpretacion')
                  ->references('id')
                  ->on('interpretaciones')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK

            $table->unsignedBigInteger('idMuestra');
            $table->foreign('idMuestra')
                ->references('id')
                ->on('muestras')
                ->onUpdate('cascade')
                ->onDelete('cascade'); // FK

            $table->text('descripcionInterpretacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interpretacion_muestra');
    }
};
