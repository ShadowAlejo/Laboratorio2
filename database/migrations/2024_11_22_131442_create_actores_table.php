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
        Schema::create('actores', function (Blueprint $table) {
            $table->id('act_id'); // Clave primaria
            $table->foreignId('sex_id') // Clave foránea
                  ->constrained('sexos', 'sex_id') // Referencia a la tabla 'sexos' y columna 'sex_id'
                  ->onDelete('cascade'); // Elimina los actores si se elimina un sexo
            $table->string('act_nombre', 80); // Nombre del actor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actores');
    }
};
