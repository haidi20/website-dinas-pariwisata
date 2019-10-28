<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use App\Models\Menu;
use App\Web\Models\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        "name"  => null,
        "color" => "#74B430",
        "parent_id" => "1",
        "position" => "header",
        "order" => 1,
        "status" => null,
        "caption" => null,
        "link" => null,
        "icon" => null,
        "lock" => 1,
    ];
});
