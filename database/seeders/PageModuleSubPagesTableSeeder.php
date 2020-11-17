<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageModuleSubPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('page_module_sub_pages')->delete();

        \DB::table('page_module_sub_pages')->insert(array (
            0 =>
            array (
                'id' => 1,
                'slug' => 'book',
                'page_module_id' => 2,
                'sub_page_module_id' => 1,
            ),
            1 =>
            array (
                'id' => 2,
                'slug' => 'reader',
                'page_module_id' => 2,
                'sub_page_module_id' => 2,
            ),
            2 =>
            array (
                'id' => 3,
                'slug' => 'genre',
                'page_module_id' => 6,
                'sub_page_module_id' => 3,
            ),
            3 =>
            array (
                'id' => 4,
                'slug' => 'author',
                'page_module_id' => 5,
                'sub_page_module_id' => 4,
            ),
        ));


    }
}
