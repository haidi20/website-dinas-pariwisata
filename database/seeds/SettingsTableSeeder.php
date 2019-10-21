<?php

use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();

        $setting = config("library.settings");
        
        foreach ($setting as $index => $item) {
            factory(Setting::class)->create([
                "key" => $item['key'],
                "value" => $item['value'],
            ]);
        }
    }
}
