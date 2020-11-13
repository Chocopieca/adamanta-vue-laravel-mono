<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('pages')->delete();

        \DB::table('pages')->insert(array (
            0 =>
            array (
                'active' => 1,
                'created_at' => '2019-11-22 19:39:29',
                'home' => 1,
                'id' => 1,
                'order' => 0,
                'page_type_id' => 1,
                'show_title' => 0,
                'slug' => '/',
                'updated_at' => '2019-11-23 15:03:21',
            ),
            2 =>
            array (
                'active' => 1,
                'created_at' => '2019-11-26 22:41:08',
                'home' => 0,
                'id' => 3,
                'order' => 0,
                'page_type_id' => 2,
                'show_title' => 1,
                'slug' => 'delivery-and-payments',
                'updated_at' => '2019-11-26 22:41:08',
            ),
            3 =>
            array (
                'active' => 1,
                'created_at' => '2019-11-26 22:41:34',
                'home' => 0,
                'id' => 4,
                'order' => 0,
                'page_type_id' => 1,
                'show_title' => 1,
                'slug' => 'contacts',
                'updated_at' => '2019-11-26 22:41:34',
            ),
            5 =>
            array (
                'active' => 1,
                'created_at' => '2019-11-29 21:56:01',
                'home' => 0,
                'id' => 6,
                'order' => 0,
                'page_type_id' => 1,
                'show_title' => 1,
                'slug' => 'reviews',
                'updated_at' => '2019-11-29 21:56:01',
            ),
        ));


    }
}
