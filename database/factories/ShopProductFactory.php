<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShopProduct;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(ShopProduct::class, function (Faker $faker) {

    $title = $faker->sentence(rand(3, 8), true);

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->realText(rand(200, 300)),
        'price' => $faker->randomFloat(2, 0, 2000),
        'category_id' => rand(1, 10),
    ];

});
