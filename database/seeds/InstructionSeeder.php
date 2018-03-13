<?php

use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 16 ; $i++) { 
            factory(App\Model\Book\Instructions::class)->create([
                'instructions_requirements_id' => $i,
            ]);
        }
    }
}
