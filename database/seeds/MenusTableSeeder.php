<?php

use Illuminate\Database\Seeder;

use App\Web\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menu::truncate();

        $menus = config('library.menus');

        foreach ($menus as $index => $item) {
            $validate = Menu::where('name', $item['name'])->first();
            if($validate == null){
                factory(Menu::class)->create([
                    "name" => $item['name'],
                    "color" => $item['color'],
                    "parent_id" => $item['parent_id'],
                    "position" => $item['position'],
                    "order" => $item['order'],
                    "status" => $item['status'],
                    "link" => $item['link'],
                    "caption" => $item['caption'],
                ]);
            }
        }
    }
}
