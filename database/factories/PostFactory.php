<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    //membuat post 1 hari 1 artikel di bulan kemarin
    // mulai dari awal bulan sampai akhir bulan
    return [
        "category_id"   => function(){
            return Category::inRandomOrder()->value('id');
        },
        "author_id"     => 1,
        "title"         => $faker->sentence(5),
        "image"         => null,
        "slug"          => null,
        "content"       => $faker->paragraph(30),
        "read"          => rand(1, 20),
        "breaking_news" => 0,
    ];
});
