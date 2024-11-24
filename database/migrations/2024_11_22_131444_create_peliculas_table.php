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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id('pel_id'); // Clave primaria (unsignedBigInteger automáticamente)
            $table->foreignId('gen_id') // Llave foránea hacia la tabla generos
                  ->constrained('generos', 'gen_id') // Relaciona con la tabla generos y columna gen_id
                  ->onDelete('cascade'); // Elimina las películas si el género es eliminado
            $table->string('pel_nombre', 100); // Nombre de la película
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
