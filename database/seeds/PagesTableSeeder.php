<?php

use Illuminate\Database\Seeder;

use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();

        for($i = 5; $i <=6; $i++){
            Factory(Page::class)->create([
                "menu_id" => $i,
            ]);
        }
    }
}
