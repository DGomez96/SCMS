<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

             $table->string('sku')->nullable();
             $table->string('name');
             $table->longText('description');
             $table->string('descrip_corta');
             $table->string('ean');
             $table->integer('stock')->nullable();
             $table->decimal('weight')->nullable();
             $table->decimal('purchase_price')->nullable();
             $table->decimal('shipping_price')->nullable();
             $table->boolean('status');
             $table->string('specifications');
             $table->unsignedBigInteger('producer_id')->index();
             $table->unsignedBigInteger('Subcategorie_id')->index();

             $table->foreign('producer_id')->references('id')
                ->on('products__producers');

             $table->foreign('Subcategorie_id')->references('id')
                ->on('categories__subCategories');

       


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
        Schema::dropIfExists('products');
    }
}

