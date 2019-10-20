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
        "slug"          => null,
        "content"       => $faker->paragraph(4),
        "read"          => rand(1, 20),
        "breaking_news" => rand(0, 1),
    ];
});
