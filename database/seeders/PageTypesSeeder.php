<?php
namespace Database\Seeders;

class PageTypesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rebuildTable('page_types', [
            [
                'name' => 'Страница',
                'key' => 'Pages'
            ],
            [
                'name' => 'Блог',
                'key' => 'Blog'
            ]
        ]);
    }
}
