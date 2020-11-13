<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageDescriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('page_descriptions')->delete();

        \DB::table('page_descriptions')->insert(array (
            0 =>
            array (
                'description' => '<p>Test text</p>',
                'id' => 1,
                'language_id' => 1,
                'meta_description' => 'Главная',
                'meta_h1' => '',
                'meta_keywords' => 'Главная',
                'meta_title' => 'Главная',
                'page_id' => 1,
                'title' => 'Главная',
            ),
            1 =>
            array (
                'description' => '',
                'id' => 2,
                'language_id' => 2,
                'meta_description' => '',
                'meta_h1' => '',
                'meta_keywords' => '',
                'meta_title' => '',
                'page_id' => 1,
                'title' => '',
            ),
            2 =>
            array (
                'description' => '',
                'id' => 3,
                'language_id' => 3,
                'meta_description' => '',
                'meta_h1' => '',
                'meta_keywords' => '',
                'meta_title' => '',
                'page_id' => 1,
                'title' => '',
            ),
            3 =>
            array (
                'description' => '',
                'id' => 7,
                'language_id' => 1,
                'meta_description' => 'Доставка и оплата',
                'meta_h1' => '',
                'meta_keywords' => 'Доставка и оплата',
                'meta_title' => 'Доставка и оплата',
                'page_id' => 2,
                'title' => 'Доставка и оплата',
            ),
            4 =>
            array (
                'description' => '',
                'id' => 8,
                'language_id' => 2,
                'meta_description' => '',
                'meta_h1' => '',
                'meta_keywords' => '',
                'meta_title' => '',
                'page_id' => 2,
                'title' => '',
            ),
            5 =>
            array (
                'description' => '',
                'id' => 9,
                'language_id' => 3,
                'meta_description' => '',
                'meta_h1' => '',
                'meta_keywords' => '',
                'meta_title' => '',
                'page_id' => 2,
                'title' => '',
            ),
            6 =>
            array (
                'description' => '',
                'id' => 10,
                'language_id' => 1,
                'meta_description' => 'Контакты',
                'meta_h1' => '',
                'meta_keywords' => 'Контакты',
                'meta_title' => 'Контакты',
                'page_id' => 3,
                'title' => 'Контакты',
            ),
            7 =>
            array (
                'description' => '',
                'id' => 11,
                'language_id' => 2,
                'meta_description' => '',
                'meta_h1' => '',
                'meta_keywords' => '',
                'meta_title' => '',
                'page_id' => 3,
                'title' => '',
            ),
            8 =>
            array (
                'description' => '',
                'id' => 12,
                'language_id' => 3,
                'meta_description' => '',
                'meta_h1' => '',
                'meta_keywords' => '',
                'meta_title' => '',
                'page_id' => 3,
                'title' => '',
            ),
            12 =>
            array (
                'description' => '<p>Отзывы</p>',
                'id' => 16,
                'language_id' => 1,
                'meta_description' => 'Отзывы',
                'meta_h1' => '',
                'meta_keywords' => 'Отзывы',
                'meta_title' => 'Отзывы',
                'page_id' => 5,
                'title' => 'Отзывы',
            ),
            13 =>
            array (
                'description' => '',
                'id' => 17,
                'language_id' => 2,
                'meta_description' => '',
                'meta_h1' => '',
                'meta_keywords' => '',
                'meta_title' => '',
                'page_id' => 5,
                'title' => '',
            ),
            14 =>
            array (
                'description' => '',
                'id' => 18,
                'language_id' => 3,
                'meta_description' => '',
                'meta_h1' => '',
                'meta_keywords' => '',
                'meta_title' => '',
                'page_id' => 5,
                'title' => '',
            )
        ));
    }
}
