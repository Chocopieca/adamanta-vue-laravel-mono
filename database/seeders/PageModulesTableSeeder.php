<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('page_modules')->delete();

        \DB::table('page_modules')->insert(array (
            0 =>
            array (
                'enabled' => 1,
                'id' => 1,
                'module_id' => 1,
                'order' => 1,
                'page_id' => 1,
            ),
            1 =>
            array (
                'enabled' => 1,
                'id' => 2,
                'module_id' => 3,
                'order' => 3,
                'page_id' => 5,
            ),
            2 =>
            array (
                'enabled' => 1,
                'id' => 4,
                'module_id' => 5,
                'order' => 4,
                'page_id' => 6,
            ),
        ));


    }
}
