<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Leiding',
            'lastName' => 'account',
            'email' => 'info@zakappje.nl',
            'role' => '2',
            'password' => '$2y$10$9Bqv1FoGKC/x4yS6v71gGep.KyQYYpxwLbjfGJBf8FYsnncYcfmx2', //secret
        ]);
    }
}
