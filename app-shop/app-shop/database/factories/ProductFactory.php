<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=> substr($faker->sentence(3),0,-1),
        'author'=>substr($faker->sentence(3),0,-1),
        'description'=> $faker->text,
        'price' =>$faker->randomFloat(2,5,150),
        'price_purchase' =>$faker->randomFloat(2,5,150),
        'num_pages' =>$faker->numberBetween($min = 1, $max = 200),
        'isbn'=> $faker->numberBetween($min = 1, $max = 2147483647),
        'quantity'=> $faker->numberBetween($min = 1, $max = 214),
        'category_id' => $faker->numberBetween(1,5)
    ];
});
