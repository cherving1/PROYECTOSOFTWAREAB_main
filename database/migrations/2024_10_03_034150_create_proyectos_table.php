<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('idProyecto'); // ID automático
            $table->string('nombreProyecto', 100)->default('blank');;
            $table->text('descripcionProyecto'); // Campo obligatorio
            $table->string('responsable', 100); // Campo obligatorio
            $table->date('fechaInicio'); // Campo obligatorio
            $table->date('fechaFin'); // Campo obligatorio
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
};
