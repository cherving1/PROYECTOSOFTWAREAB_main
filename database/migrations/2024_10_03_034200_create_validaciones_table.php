<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('validaciones', function (Blueprint $table) {
            $table->increments('idValidacion');
            $table->unsignedInteger('idProyecto');
            $table->string('estadoValidacion', 50);
            $table->text('observaciones')->nullable();
            $table->date('fechaValidacion');
            $table->timestamps();

            $table->foreign('idProyecto')->references('idProyecto')->on('proyectos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('validaciones');
    }
};
