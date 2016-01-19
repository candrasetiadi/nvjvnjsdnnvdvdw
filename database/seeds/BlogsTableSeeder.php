<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{

    protected $table_name = 'blogs';


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = array(
            'url' => 'blog-1',
            'title' => 'Blog 1',
            'tags' => 'Blog 1',
            'locale' => 'en',
            'image' => 'Untitled-1.jpg',
            'content' => 'Lorem Ipsum',
            'status' => 1,
            'category' => 2,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        );
        $data[] = array(
            'url' => 'blog-2',
            'title' => 'Blog 2',
            'tags' => 'Blog 2',
            'locale' => 'fr',
            'image' => 'Untitled-1.jpg',
            'content' => 'Lorem Ipsum',
            'status' => 1,
            'category' => 3,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        );
        $data[] = array(
            'url' => 'blog-3',
            'title' => 'Blog 3',
            'tags' => 'Blog 3',
            'locale' => 'en',
            'image' => 'Untitled-1.jpg',
            'content' => 'Lorem Ipsum',
            'status' => 1,
            'category' => 1,
            'author_id' => '1',
            'created_at' => date("Y-m-d H:i:s")
        );
        DB::table($this->table_name)->insert($data);
    }
}
