<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicasContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas__contenidos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('contenido_caracteristica');
            
            $table->unsignedBigInteger('id_caracteristica')->index();
            $table->foreign('id_caracteristica')->references('id')->on('caracteristicas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas__contenidos');
    }
}
