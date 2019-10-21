<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Inbox;
use Faker\Generator as Faker;

$factory->define(Inbox::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "subject" => $faker->sentence(5),
        "phone" => $faker->phoneNumber,
        "email" => $faker->email,
        "message" => $faker->sentence(10),
    ];
});
