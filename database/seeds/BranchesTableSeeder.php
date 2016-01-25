<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Branch::create([
            'name' => 'denpasar',
            'city' => 'denpasar',
            'province' => 'bali',
            'country' => 'indonesia'
        ]);

        \App\Branch::create([
            'name' => 'surabaya',
            'city' => 'surabaya',
            'province' => 'jawatimur',
            'country' => 'indonesia'
        ]);

    }
}
