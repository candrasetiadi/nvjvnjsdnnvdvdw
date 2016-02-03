<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = \App\Category::create([
            'route' => 'villa',
            'parent_id' => 0,
            'order' => 1
        ]);

        \App\CategoryLanguage::create([
            'category_id' => $category->id,
            'locale' => 'en',
            'title' => 'villas'
        ]);

        $category = \App\Category::create([
            'route' => 'land',
            'parent_id' => 0,
            'order' => 2
        ]);

        \App\CategoryLanguage::create([
            'category_id' => $category->id,
            'locale' => 'en',
            'title' => 'lands'
        ]);

        $category = \App\Category::create([
            'route' => 'beachfront-property',
            'parent_id' => 1,
            'order' => 2
        ]);

        \App\CategoryLanguage::create([
            'category_id' => $category->id,
            'locale' => 'en',
            'title' => 'beachfront property'
        ]);

        $category = \App\Category::create([
            'route' => 'home-and-retirement',
            'parent_id' => 1,
            'order' => 2
        ]);

        \App\CategoryLanguage::create([
            'category_id' => $category->id,
            'locale' => 'en',
            'title' => 'home and retirement'
        ]);

    }
}
