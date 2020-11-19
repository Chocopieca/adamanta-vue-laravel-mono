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
                'title' => 'Владелец',
                'not_remove' => 1,
                'access_admin' => 1
            ],
            [
                'key' => 'user',
                'title' => 'Пользователь',
                'not_remove' => 1,
                'access_admin' => 0
            ],
            [
                'key' => 'admin',
                'title' => 'Админ',
                'not_remove' => 0,
                'access_admin' => 1
            ],
            [
                'key' => 'manager',
                'title' => 'Менеджер',
                'not_remove' => 0,
                'access_admin' => 1
            ]
        ]);
    }
}
