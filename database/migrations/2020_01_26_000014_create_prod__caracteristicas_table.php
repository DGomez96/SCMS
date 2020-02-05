<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas__productC', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_product')->index();
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            
            $table->unsignedBigInteger('id_caracteristica')->index();
            $table->foreign('id_caracteristica')->references('id')->on('caracteristicas__contenidos')->onDelete('cascade');

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
        Schema::dropIfExists('caracteristicas__productC');
    }
}
