<?php
namespace Database\Seeders;

class RolesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rebuildTable('roles', [
            [
                'key' => 'main_admin',
                'title' => 'Owner',
                'not_remove' => 1,
            ],
            [
                'key' => 'admin',
                'title' => 'Admin',
                'not_remove' => 0,
            ],
            [
                'key' => 'manager',
                'title' => 'Manager',
                'not_remove' => 0,
            ]
        ]);
    }
}
