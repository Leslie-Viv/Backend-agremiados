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
        Schema::create('agremiados', function (Blueprint $table) {
            $table->id();
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            $table->string('nombres');
            $table->enum('sexo', ['Hombre', 'Mujer', 'No_especificado'],);
            $table->string('NUP', 10)->unique();
            $table->string('NUE')->unique();
            $table->string('RFC', 13)->unique();
            $table->string('NSS', 11)->unique();
            $table->date('fechadenacimiento');
            $table->string('telefono', 10);
            $table->enum('cuota', [1, 0]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agremiados');
    }
};
