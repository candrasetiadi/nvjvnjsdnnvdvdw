<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    protected $table_name = 'groups';
    
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = array(
                    'id' => 1,
                    'title_en' => 'Beginner',
                    'url_en' => 'beginner',
                    'title_fr' => 'Beginner-fr',
                    'url_fr' => 'beginner-fr'
                );
        $data[] = array(
                    'id' => 2,
                    'title_en' => 'Go Diving',
                    'url_en' => 'go-diving',
                    'title_fr' => 'Go Diving-fr',
                    'url_fr' => 'go-diving-fr'
                );
        $data[] = array(
                    'id' => 3,
                    'title_en' => 'Dive Training',
                    'url_en' => 'dive-training',
                    'title_fr' => 'Dive Training-fr',
                    'url_fr' => 'dive-training-fr'
                );
        $data[] = array(
                    'id' => 4,
                    'title_en' => 'Become Pro',
                    'url_en' => 'become-pro',
                    'title_fr' => 'Become Pro-fr',
                    'url_fr' => 'become-pro-fr'
                );
        DB::table($this->table_name)->insert($data);
    }
    
}
