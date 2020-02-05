<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products__ofertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_product')->index();
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->timestamp('Tiempo_Oferta');	
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
        Schema::dropIfExists('products__ofertas');
    }
}
