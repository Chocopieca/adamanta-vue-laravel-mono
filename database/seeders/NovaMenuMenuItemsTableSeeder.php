<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NovaMenuMenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('nova_menu_menu_items')->delete();

        \DB::table('nova_menu_menu_items')->insert(array (
            0 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-23 15:19:33',
                'enabled' => 1,
                'id' => 2,
                'menu_id' => 1,
                'name' => 'Главная',
                'order' => 1,
                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-23 15:23:13',
                'value' => '/',
                'locale' => 'ru',
            ),
            1 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-23 15:20:08',
                'enabled' => 1,
                'id' => 3,
                'menu_id' => 1,
                'name' => 'Контакты',
                'order' => 4,

                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:51:20',
                'value' => 'contacts',
                'locale' => 'ru',
            ),
            2 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-23 15:20:52',
                'enabled' => 1,
                'id' => 4,
                'menu_id' => 1,
                'name' => 'Доставка и оплата',
                'order' => 5,
                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:51:20',
                'value' => 'delivery-and-payments',
                'locale' => 'ru',
            ),
            3 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-23 15:21:11',
                'enabled' => 1,
                'id' => 5,
                'menu_id' => 1,
                'name' => 'Отзывы',
                'order' => 6,

                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:51:20',
                'value' => 'reviews',
                'locale' => 'ru',
            ),
            4 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-26 22:31:10',
                'enabled' => 1,
                'id' => 6,
                'menu_id' => 1,
                'name' => 'Home',
                'order' => 1,
                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:52:08',
                'value' => '/',
                'locale' => 'en',
            ),
            5 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-26 22:32:02',
                'enabled' => 1,
                'id' => 7,
                'menu_id' => 1,
                'name' => 'Contacts',
                'order' => 4,

                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:52:27',
                'value' => 'top',
                'locale' => 'en',
            ),
            6 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-26 22:32:14',
                'enabled' => 1,
                'id' => 8,
                'menu_id' => 1,
                'name' => 'Delivery and payment',
                'order' => 5,

                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:52:27',
                'value' => 'blog',
                'locale' => 'en',
            ),
            7 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-26 22:32:28',
                'enabled' => 1,
                'id' => 9,
                'menu_id' => 1,
                'name' => 'Reviews',
                'order' => 6,

                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:52:28',
                'value' => 'contacts',
                'locale' => 'en',
            ),
            8 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-26 22:32:58',
                'enabled' => 1,
                'id' => 10,
                'menu_id' => 1,
                'name' => 'Головна',
                'order' => 1,
                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:53:29',
                'value' => '/',
                'locale' => 'uk',
            ),
            9 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-26 22:33:12',
                'enabled' => 1,
                'id' => 11,
                'menu_id' => 1,
                'name' => 'Контакти',
                'order' => 4,

                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:53:31',
                'value' => 'top',
                'locale' => 'uk',
            ),
            10 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-26 22:33:24',
                'enabled' => 1,
                'id' => 12,
                'menu_id' => 1,
                'name' => 'Доставка та оплата',
                'order' => 5,

                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:53:32',
                'value' => 'blog',
                'locale' => 'uk',
            ),
            11 =>
            array (
                'class' => 'OptimistDigital\\MenuBuilder\\MenuItemTypes\\MenuItemStaticURLType',
                'created_at' => '2019-11-26 22:34:00',
                'enabled' => 1,
                'id' => 13,
                'menu_id' => 1,
                'name' => 'Видгуки',
                'order' => 6,

                'parent_id' => NULL,
                'target' => '_self',
                'updated_at' => '2019-11-29 21:53:32',
                'value' => 'contacts',
                'locale' => 'uk',
            ),
        ));


    }
}
