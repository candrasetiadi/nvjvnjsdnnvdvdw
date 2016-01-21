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

        factory(App\Branch::class)->create();

        factory(App\PostCategory::class, 2)->create()
        ->each(function($cat) {
            $cat->postCategoryLanguages()->save(factory(App\PostCategoryLanguage::class)->make());
        });

        factory(App\Category::class, 2)->create()
        ->each(function($cat) {
            $cat->categoryLanguages()->save(factory(App\CategoryLanguage::class)->make());
        });

        factory(App\User::class, 10)->create()->each(function($u) {

            for($i = 0; $i < 10; $i++) {

                $u->posts()->save(factory(App\Post::class)->make());

                $u->properties()->save(factory(App\Property::class)->make());
            }

        });

        factory(App\Customer::class, 100)->create();

    }
}
