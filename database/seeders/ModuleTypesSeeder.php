<?php
namespace Database\Seeders;

class ModuleTypesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rebuildTable(
            'module_types',
            [
                ['key' => 'Slider', 'url' => 'resources/module-sliders'],
                ['key' => 'BlogPreview', 'url' => ''],
                ['key' => 'FAQ', 'url' => 'resources/module-faqs'],
                ['key' => 'Blog', 'url' => ''],
                ['key' => 'Contacts', 'url' => ''],
            ]
        );
    }
}
