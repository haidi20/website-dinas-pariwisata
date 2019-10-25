<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $categories = config('library.categories');

        foreach ($categories as $index => $item) {
            factory(Category::class)->create([
                "name" => $item['name'],
                "color" => $item['color'],
            ]);
        } 
    }
}
