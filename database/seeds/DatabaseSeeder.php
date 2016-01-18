<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(BlogsTableSeeder::class);
        //$this->call(EventsTableSeeder::class);
        //$this->call(GroupsTableSeeder::class);
        //$this->call(CategoriesTableSeeder::class);

        Model::reguard();
    }
}
