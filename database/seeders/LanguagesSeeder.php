<?php
namespace Database\Seeders;

class LanguagesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rebuildTable(
            'languages',
            [
                [
                    'name' => 'Русский',
                    'title' => 'Русский',
                    'code' => 'ru',
                    'iso_code' => 'ru_Ru',
                    'is_default' => '1',
                    'active' => '1'
                ],
                [
                    'name' => 'Английский',
                    'title' => 'English',
                    'code' => 'en',
                    'iso_code' => 'en_US',
                    'is_default' => '0',
                    'active' => '1'
                ],
                [
                    'name' => 'Украинский',
                    'title' => 'Українська',
                    'code' => 'uk',
                    'iso_code' => 'uk_UA',
                    'is_default' => '0',
                    'active' => '1'
                ]
            ],
            ['languages', 'languages']
        );
    }
}
