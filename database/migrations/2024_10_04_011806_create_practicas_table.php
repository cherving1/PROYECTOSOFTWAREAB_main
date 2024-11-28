<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('practicas', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->integer('idestudiante');
            $table->integer('iddocente');
            $table->integer('idempresa');
            $table->integer('idetapa');
            $table->string('titulo', 255)->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('practicas');
    }
}
