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
    if (!Schema::hasColumn('appointments', 'worker')) {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('worker')->nullable(); // Añadimos la columna que falta
        });
    }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            //
        });
    }
};
