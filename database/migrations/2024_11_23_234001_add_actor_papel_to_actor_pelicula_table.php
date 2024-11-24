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
        Schema::table('actor_pelicula', function (Blueprint $table) {
            $table->string('actor_papel', 60)->after('pel_id'); // Campo nuevo después de pel_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actor_pelicula', function (Blueprint $table) {
            $table->dropColumn('actor_papel'); // Elimina el campo si se revierte la migración
        });
    }
};
