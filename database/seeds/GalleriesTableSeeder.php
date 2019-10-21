<?php

use Illuminate\Database\Seeder;

use App\Models\Gallery;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::truncate();

        $galleries = config('library.galleries');

        foreach ($galleries as $index => $item) {
            factory(Gallery::class)->create([
                "name" => $item['name'],
                "type" => $item['type'],
                "link" => $item['link'],
            ]);
        }
    }
}
