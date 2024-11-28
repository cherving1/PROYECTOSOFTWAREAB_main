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
        Schema::create('certificaciones', function (Blueprint $table) {
            $table->increments('idCertificacion');
            $table->unsignedInteger('idProyecto');
            $table->string('nombreCertificacion', 100)->nullable(false);
            $table->date('fechaCertificacion')->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('idProyecto')->references('idProyecto')->on('proyectos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('certificaciones');
    }
};
