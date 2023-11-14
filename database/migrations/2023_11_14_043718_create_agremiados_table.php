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
            $table->timestamps();
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            $table->string('nombres');
            $table->string('sexo');
            $table->string('NUP');
            $table->string('NUE');
            $table->string('RFC');
            $table->string('NSS');
            $table->string('fechadenacimiento');
            $table->string('telefono');
            $table->integer('cuota');
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
