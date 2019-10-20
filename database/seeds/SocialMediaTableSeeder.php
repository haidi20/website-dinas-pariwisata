<?php

use Illuminate\Database\Seeder;

use App\Models\Media;

class SocialMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::truncate();

        $socialMedia = config("library.social_media");
        
        foreach ($socialMedia as $index => $item) {
            factory(Media::class)->create([
                "name" => $item['name'],
                "link" => $item['link'],
            ]);
        }

    }
}
