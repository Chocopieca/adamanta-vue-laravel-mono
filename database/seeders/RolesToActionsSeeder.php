<?php
namespace Database\Seeders;

class RolesToActionsSeeder extends BaseSeeder
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
        $countTabs = \App\Models\Action::count();
        for($i=1; $i <= $countTabs; $i++) {
            $data[] = ['role_id' => 1, 'action_id' => $i];
        }

        $this->rebuildTable('roles_to_actions', $data);
    }
}
