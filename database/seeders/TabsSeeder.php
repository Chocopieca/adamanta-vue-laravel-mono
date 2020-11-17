<?php
namespace Database\Seeders;

class TabsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rebuildTable('tabs', [
            [
                'name' => 'Ресурсы',
                'key' => 'resources',
                'path' => '#',
                'icon' => 'assessment',
                'parent_id' => 0,
                'active' => 1,
                'order' => 1,
            ],
            [
                'name' => 'Страницы',
                'key' => 'pages',
                'path' => 'resources/pages',
                'icon' => 'question_answer',
                'parent_id' => 1,
                'active' => 1,
                'order' => 2,
            ],
            [
                'name' => 'Товары',
                'key' => 'products',
                'path' => 'resources/products',
                'icon' => 'push_pin',
                'parent_id' => 1,
                'active' => 1,
                'order' => 3,
            ],
            [
                'name' => 'Категории',
                'key' => 'categories',
                'path' => 'resources/categories',
                'icon' => 'power',
                'parent_id' => 1,
                'active' => 1,
                'order' => 3,
            ],
            [
                'name' => 'Доступ',
                'key' => 'access',
                'path' => '#',
                'icon' => 'security',
                'parent_id' => 0,
                'active' => 1,
                'order' => 7,
            ],
            [
                'name' => 'Меню',
                'key' => 'access_tab',
                'path' => 'access/tabs',
                'icon' => 'tab',
                'parent_id' => 5,
                'active' => 1,
                'order' => 9,
            ],
            [
                'name' => 'Роли',
                'key' => 'access_role',
                'path' => 'resources/roles',
                'icon' => 'hdr_weak',
                'parent_id' => 5,
                'active' => 1,
                'order' => 10,
            ],
            [
                'name' => 'Пользователи',
                'key' => 'access_user',
                'path' => 'resources/users',
                'icon' => 'group',
                'parent_id' => 0,
                'active' => 1,
                'order' => 11,
            ],
            [
                'name' => 'Настройки',
                'key' => 'settings',
                'path' => '#',
                'icon' => 'settings',
                'parent_id' => 0,
                'active' => 1,
                'order' => 12,
            ],
            [
                'name' => 'Языки',
                'key' => 'languages',
                'path' => 'resources/languages',
                'icon' => 'language',
                'parent_id' => 9,
                'active' => 1,
                'order' => 13,
            ],
            [
                'name' => 'Параметры',
                'key' => 'params',
                'path' => 'settings',
                'icon' => 'settings',
                'parent_id' => 9,
                'active' => 1,
                'order' => 14,
            ],
            [
                'name' => 'Меню сайта',
                'key' => 'sie_menu',
                'path' => 'resources/nova-menus',
                'icon' => 'tab',
                'parent_id' => 9,
                'active' => 1,
                'order' => 15,
            ],
        ]);
    }
}
