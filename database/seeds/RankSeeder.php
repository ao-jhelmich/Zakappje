<?php

use Illuminate\Database\Seeder;
use App\Model\Book\Ranks;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 4 ; $i++) { 
            Ranks::create([
                'rank_name' => "klas {$i}",
            ]);
        }
    }
}
