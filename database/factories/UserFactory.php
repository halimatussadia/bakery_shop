<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\User::class, function (Faker $faker) {
    return [
        'role' => 'admin',
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'district' => $faker->country,
        'address' => $faker->city, // secret
        'number' => $faker->phoneNumber,
        'password'=> Hash::make('12356'),

    ];
});
