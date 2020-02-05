<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquetas__products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_etiquetas')->index();
            $table->unsignedBigInteger('id_product')->index();

            $table->foreign('id_etiquetas')->references('id')->on('etiquetas');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('etiquetas__products');
    }
}
