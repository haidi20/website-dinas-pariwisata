<?php

use Illuminate\Database\Seeder;

use App\Models\Share;

class SharesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Share::truncate();

        $shares = config("library.shares");
        
        foreach ($shares as $index => $item) {
            factory(Share::class)->create([
                "name" => $item['name'],
            ]);
        }
    }
}
