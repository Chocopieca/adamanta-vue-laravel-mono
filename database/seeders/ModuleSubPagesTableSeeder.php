<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModuleSubPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('module_sub_pages')->delete();

        \DB::table('module_sub_pages')->insert(array (
            0 =>
            array (
                'id' => 1,
                'module_id' => 3,
                'key' => 'Book',
            ),
            1 =>
            array (
                'id' => 2,
                'module_id' => 3,
                'key' => 'Reader',
            ),
            2 =>
            array (
                'id' => 3,
                'module_id' => 4,
                'key' => 'Genre',
            ),
            3 =>
            array (
                'id' => 4,
                'module_id' => 5,
                'key' => 'Author',
            ),
        ));


    }
}
