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
            'parent' => 0,
            'order' => 1
        ]);

        \App\CategoryLanguage::create([
            'category_id' => $category->id,
            'locale' => 'en',
            'title' => 'villas'
        ]);

        $category = \App\Category::create([
            'parent' => 0,
            'order' => 2
        ]);

        \App\CategoryLanguage::create([
            'category_id' => $category->id,
            'locale' => 'en',
            'title' => 'lands'
        ]);

    }
}
