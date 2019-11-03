<?php

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'product_name' => $faker->name,
        'product_no' => $faker->randomDigit,
        'type' => 'Regular',
        'product_image' => $faker->imageUrl(),
        'flavour' => 'cocholate',
        'weight' => 5,
        'price'  =>1000.00,
        'status' => 'active',
    ];
});
