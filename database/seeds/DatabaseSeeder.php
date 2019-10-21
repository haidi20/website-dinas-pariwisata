<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(SocialMediaTableSeeder::class);
        $this->call(SharesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(InboxsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(PagesTableSeeder::class);
    }
}
