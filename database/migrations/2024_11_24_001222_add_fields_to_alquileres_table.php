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
        Schema::table('alquileres', function (Blueprint $table) {
            // Añadir el campo pel_id (relación con la tabla peliculas)
            $table->foreignId('pel_id') // Llave foránea hacia la tabla peliculas
                  ->constrained('peliculas', 'pel_id') // Relaciona con la tabla peliculas y columna pel_id
                  ->onDelete('cascade'); // Elimina el alquiler si la película asociada es eliminada

            // Añadir fecha de inicio y fin del alquiler
            $table->date('fecha_alquiler_inicio'); // Fecha de inicio del alquiler
            $table->date('fecha_alquiler_final'); // Fecha de fin del alquiler

            // Añadir el valor del alquiler
            $table->decimal('valor_alquiler', 8, 2); // Valor del alquiler con 2 decimales

            // Añadir la fecha de entrega
            $table->date('fecha_entrega'); // Fecha de entrega
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alquileres', function (Blueprint $table) {
            // Eliminar las columnas añadidas
            $table->dropForeign(['pel_id']);
            $table->dropColumn(['pel_id', 'fecha_alquiler_inicio', 'fecha_alquiler_final', 'valor_alquiler', 'fecha_entrega']);
        });
    }
};
