<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    //membuat post 1 hari 1 artikel di bulan kemarin
    // mulai dari awal bulan sampai akhir bulan
    $title = $faker->sentence(5);

    return [
        "category_id"   => function(){
            return Category::inRandomOrder()->value('id');
        },
        "author_id"     => 1,
        "title"         => $title,
        "image"         => null,
        "slug"          => str_slug($title),
        "content"       => $faker->paragraph(60),
        "read"          => rand(1, 20),
        "breaking_news" => 0,
    ];
});
