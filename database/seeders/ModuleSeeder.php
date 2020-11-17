<?php
namespace Database\Seeders;

class ModuleSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rebuildTable(
            'modules',
            [
                [
                    'key' => 'SliderBooks',
                    'url' => '',
                    'name' => 'Слайдер с книгами',
                    'for_all' => 0,
                    'show_title' => 0,
                    'order' => 1,
                    'position' => 1,
                ],
                [
                    'key' => 'Blog',
                    'url' => '',
                    'name' => 'Блог',
                    'for_all' => 0,
                    'show_title' => 0,
                    'order' => 2,
                    'position' => 0,
                ],
                [
                    'key' => 'Books',
                    'url' => '',
                    'name' => 'Книги',
                    'for_all' => 0,
                    'show_title' => 0,
                    'order' => 3,
                    'position' => 0,
                ],
                [
                    'key' => 'Genres',
                    'url' => '',
                    'name' => 'Жанры',
                    'for_all' => 0,
                    'show_title' => 0,
                    'order' => 4,
                    'position' => 0,
                ],
                [
                    'key' => 'Authors',
                    'url' => '',
                    'name' => 'Авторы',
                    'for_all' => 0,
                    'show_title' => 0,
                    'order' => 5,
                    'position' => 0,
                ],
                [
                    'key' => 'FeedbackForm',
                    'url' => '',
                    'name' => 'Форма обратной связи',
                    'for_all' => 0,
                    'show_title' => 0,
                    'order' => 6,
                    'position' => 1,
                ]
            ]
        );
    }
}
