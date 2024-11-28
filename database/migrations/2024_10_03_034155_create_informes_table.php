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
        Schema::create('informes', function (Blueprint $table) {
            $table->increments('idInforme');
            $table->unsignedInteger('idProyecto');
            $table->text('descripcionInforme');
            $table->date('fechaEntrega');
            $table->timestamps();

            $table->foreign('idProyecto')->references('idProyecto')->on('proyectos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('informes');
    }

};
