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
        Schema::create('interpretaciones', function (Blueprint $table) {
            // Campos genéricos
            $table->id(); // PK
            $table->timestamps();

            // Campos añadidos
            $table->unsignedBigInteger('idNaturaleza');
            $table->foreign('idNaturaleza')
                  ->references('id')
                  ->on('naturalezas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // FK

            $table->string('codigo')->unique();
            $table->text('texto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interpretaciones');
    }
};
