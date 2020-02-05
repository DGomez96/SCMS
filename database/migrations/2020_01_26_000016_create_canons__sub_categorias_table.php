<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanonsSubCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canons__subCategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            


            $table->unsignedBigInteger('id_subCategories')->index();
            $table->foreign('id_subCategories')->references('id')->on('categories__subCategories')->onDelete('cascade');
            


            $table->unsignedBigInteger('id_canon')->index();
            $table->foreign('id_canon')->references('id')->on('canons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canons__sub_categorias');
    }
}
