<?php

use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_no' => $faker->randomDigit,
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl(500,500),
        'status' => 'active',
    ];
});
