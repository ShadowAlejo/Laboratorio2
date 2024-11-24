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
        Schema::create('actor_pelicula', function (Blueprint $table) {
            $table->id(); // Clave primaria para la tabla pivote (auto-incremental)
            $table->foreignId('act_id') // Llave foránea hacia la tabla actores
                  ->constrained('actores', 'act_id') // Relaciona con la tabla actores y columna act_id
                  ->onDelete('cascade'); // Elimina la relación si el actor es eliminado
            $table->foreignId('pel_id') // Llave foránea hacia la tabla peliculas
                  ->constrained('peliculas', 'pel_id') // Relaciona con la tabla peliculas y columna pel_id
                  ->onDelete('cascade'); // Elimina la relación si la película es eliminada
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_pelicula');
    }
};
