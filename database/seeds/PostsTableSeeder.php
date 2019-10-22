<?php

use Illuminate\Database\Seeder;

use App\Models\Post;

use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $start = Carbon::now()->subMonth()->startOfMonth();
        $end = Carbon::now()->subMonth()->endOfMonth();
        
        $limit = 1;
        $number = 1;
        for($day = $start->copy(); $day->diffInDays($end); $day->addDay()){
            $value = rand(0, 1);

            if($number >= 15){
                $number = 1;
            }

            if($number <=9){
                $zero = 0;
            }else{
                $zero = null;
            }

            if($limit <= 5 && $value == 1){
                $limit++;
            }else{
                $value = 0;
            }

           factory(Post::class)->create([
                "created_at" => $day->format('Y-m-d 10:i:s'),
                "updated_at" => $day->format('Y-m-d 10:i:s'),
                "breaking_news" => $value,
                "image" => "pemerintah/POSTER BARU PARIWISATA-".$zero.$number.".jpg"
            ]);

            $number++;
        }

    }
}
