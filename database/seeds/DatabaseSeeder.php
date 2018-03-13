<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RankSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(InstructionSeeder::class);
        $this->call(RequirementsSeeder::class);
        $this->call(MainRequirementsSeeder::class);
    }
}
