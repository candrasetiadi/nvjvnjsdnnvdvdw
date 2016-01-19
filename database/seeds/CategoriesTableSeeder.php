<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    protected $table_name = 'categories';


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = array(
                    'id' => 1,
                    'parent' => 1,
                    'locale' => 'en',
                    'title' => 'Try Scuba Diving',
                    'url' => 'try-scuba-diving'
                );
        $data[] = array(
                    'id' => 2,
                    'parent' => 1,
                    'locale' => 'en',
                    'title' => 'Entry Level Courses',
                    'url' => 'entry-level-courses'
                );
        $data[] = array(
                    'id' => 3,
                    'parent' => 2,
                    'locale' => 'en',
                    'title' => 'Daily Diving Trips',
                    'url' => 'daily-diving-trips'
                );
        $data[] = array(
                    'id' => 4,
                    'parent' => 2,
                    'locale' => 'en',
                    'title' => 'Dive Safari',
                    'url' => 'dive-safari'
                );
        $data[] = array(
                    'id' => 5,
                    'parent' => 2,
                    'locale' => 'en',
                    'title' => 'Aurora Live Aboard',
                    'url' => 'aurora-live-aboard'
                );
        $data[] = array(
                    'id' => 6,
                    'parent' => 3,
                    'locale' => 'en',
                    'title' => 'Entry Level Courses',
                    'url' => 'entry-level-courses'
                );
        $data[] = array(
                    'id' => 7,
                    'parent' => 3,
                    'locale' => 'en',
                    'title' => 'Advanced Level Courses',
                    'url' => 'advanced-level-courses'
                );
        $data[] = array(
                    'id' => 8,
                    'parent' => 3,
                    'locale' => 'en',
                    'title' => 'Padi Specialty Courses',
                    'url' => 'padi-specialty-courses'
                );
        $data[] = array(
                    'id' => 9,
                    'parent' => 3,
                    'locale' => 'en',
                    'title' => 'Go Tec',
                    'url' => 'go-tec'
                );
        $data[] = array(
                    'id' => 10,
                    'parent' => 4,
                    'locale' => 'en',
                    'title' => 'Padi Dive Master Courses',
                    'url' => 'padi-dive-master-courses'
                );
        $data[] = array(
                    'id' => 11,
                    'parent' => 4,
                    'locale' => 'en',
                    'title' => 'Instructor Development Courses',
                    'url' => 'instructor-development-courses'
                );
        $data[] = array(
                    'id' => 12,
                    'parent' => 4,
                    'locale' => 'en',
                    'title' => 'Instructor Specialties',
                    'url' => 'instructor-specialties'
                );
        DB::table($this->table_name)->insert($data);
    }
}
