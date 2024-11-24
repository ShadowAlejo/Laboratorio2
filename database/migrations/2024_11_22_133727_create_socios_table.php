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
        Schema::create('socios', function (Blueprint $table) {
            $table->id('soc_id'); // Primary Key
            $table->string('soc_cedula', 10)->unique(); // Cédula con validación de unicidad
            $table->string('soc_nombre', 60); // Nombre del socio
            $table->string('soc_direccion', 60)->nullable(); // Dirección
            $table->string('soc_telefono', 10)->nullable(); // Teléfono
            $table->string('soc_correo', 60)->nullable(); // Correo electrónico
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socios');
    }
};
