<?php

use Illuminate\Database\Seeder;

use App\Models\Inbox;

class InboxsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inbox::truncate();

        factory(Inbox::class, 5)->create();
    }
}
