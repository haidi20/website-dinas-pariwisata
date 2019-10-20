<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $categories = ['Hutan', 'Pantai', 'Wisata'];

    return [
        'name' => $faker->randomElement($categories, rand(0,2)),
    ];
});
