<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Language::create([
            'name' => 'english',
            'code' => 'en',
            'icon' => 'en.png'
        ]);

        \App\Language::create([
            'name' => 'bahasa',
            'code' => 'id',
            'icon' => 'id.png'
        ]);

        \App\Language::create([
            'name' => 'french',
            'code' => 'fr',
            'icon' => 'fr.png'
        ]);

        \App\Language::create([
            'name' => 'rusian',
            'code' => 'ru',
            'icon' => 'ru.png'
        ]);

    }
}
