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
        Schema::table('peliculas', function (Blueprint $table) {
            // Agregar llave foránea hacia la tabla directores
            $table->foreignId('dir_id')
                  ->nullable() // Permitir valores nulos para registros existentes
                  ->constrained('directores', 'dir_id')
                  ->onDelete('cascade'); // Eliminar películas si el director es eliminado

            // Agregar llave foránea hacia la tabla formatos
            $table->foreignId('for_id')
                  ->nullable()
                  ->constrained('formatos', 'for_id')
                  ->onDelete('cascade'); // Eliminar películas si el formato es eliminado

            // Agregar nuevas columnas
            $table->decimal('costo', 10, 2)->nullable(); // Columna para el costo
            $table->date('fecha_estreno')->nullable(); // Columna para la fecha de estreno
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Eliminar las columnas y las relaciones añadidas
            $table->dropForeign(['dir_id']);
            $table->dropForeign(['for_id']);
            $table->dropColumn(['dir_id', 'for_id', 'costo', 'fecha_estreno']);
        });
    }
};
