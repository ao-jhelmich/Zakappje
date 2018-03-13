<?php

use Illuminate\Database\Seeder;
use App\Model\Book\requirements;

class RequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 16 ; $i++) { 
            factory(requirements::class)->create([
                'requirements_mainrequirements_id' => $i,
            ]);
        }
    }
}
