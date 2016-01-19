<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    protected $table_name = 'events';


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = array(
                    'url' => 'event-1',
                    'locale' => 'en',
                    'title' => 'Event 1',
                    'image' => 'Untitled-1.jpg',
                    'content' => 'Lorem Ipsum',
                    'author_id' => '1',
                    'created_at' => date("Y-m-d H:i:s")
                );
        $data[] = array(
                    'url' => 'event-2',
                    'locale' => 'en',
                    'title' => 'Event 2',
                    'image' => 'Untitled-1.jpg',
                    'content' => 'Lorem Ipsum',
                    'author_id' => '1',
                    'created_at' => date("Y-m-d H:i:s")
                );
        $data[] = array(
                    'url' => 'event-3',
                    'locale' => 'en',
                    'title' => 'Event 3',
                    'image' => 'Untitled-1.jpg',
                    'content' => 'Lorem Ipsum',
                    'author_id' => '1',
                    'created_at' => date("Y-m-d H:i:s")
                );
        DB::table($this->table_name)->insert($data);
    }
}
