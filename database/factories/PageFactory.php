<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        "menu_id" => null,
        "title" => $faker->sentence(3),
        "content" => "<p>".$faker->sentence(20)."</p>",

    ];
});
