<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([

            'username' => 'kevincharit',
            'email' => 'kevin@kesato.com',
            'password' => '$2y$10$PMXrmUKV/4znb9rTJXGpSuHnzagpRggTWab/zvogSGHMAMRKPq9.e',
            'remember_token' => str_random(10),
            'role_id' => 1,
            'position_id' => 1,
            'branch_id' => 1,
            'firstname' => 'kevin',
            'lastname' => 'charit',
            'address' => 'jalan plawa 8',
            'phone' => '0361',
            'city' => 'Denpasar',
            'province' => 'Bali',
            'country' => 'Indonesia',
            'zipcode' => '68486',
            'image' => 'user.jpg',
            'active' => 1

        ]);

    }
}
