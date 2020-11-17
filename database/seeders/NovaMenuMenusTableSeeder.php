<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NovaMenuMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('nova_menu_menus')->delete();

        \DB::table('nova_menu_menus')->insert(array (
            0 =>
            array (
                'created_at' => '2019-11-23 15:18:55',
                'id' => 1,
                'name' => 'Header Главное меню',
                'slug' => '/',
                'updated_at' => '2019-11-23 15:18:55',
            ),
        ));


    }
}
