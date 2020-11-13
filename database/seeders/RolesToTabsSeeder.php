<?php
namespace Database\Seeders;

class RolesToTabsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        // Super admin
        $countTabs = \App\Models\Tabs::count();
        for($i=1; $i <= $countTabs; $i++) {
            $data[] = ['role_id' => 1, 'tab_id' => $i];
        }

        $this->rebuildTable('roles_to_tabs', $data);
    }
}
