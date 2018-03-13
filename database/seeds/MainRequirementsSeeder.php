<?php

use Illuminate\Database\Seeder;
use App\Model\Book\mainrequirements;

class MainRequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 4; $x++) { 
            factory(mainrequirements::class, 4)->create([
                'mainrequirements_rank_id' => $x, 
            ]);
        }
    }
}
