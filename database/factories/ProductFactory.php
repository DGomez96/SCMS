<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {

    return [
        //
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'img' =>$faker->image(storage_path('images'),400,300) ,
        'caracteristicas' =>  $faker->biasedNumberBetween(0,9)
    ];
});
