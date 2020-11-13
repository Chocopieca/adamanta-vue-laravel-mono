<?php
namespace Database\Seeders;

class ActionsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accesses = [
            'View' => 'view',
            'Create' => 'create',
            'Update' => 'update',
            'Delete' => 'delete'
        ];

        $data = [];

        // By tabs
        $tabs = \App\Models\Tabs::get();
        foreach ($tabs as $tab) {
            if(!empty($tab->key)) {
                foreach ($accesses as $key => $access) {
                    $data[] = [
                        'tab_id' => $tab->id,
                        'key' => str_replace(' ', '_', mb_strtolower($tab->key)) . '_' . $access,
                        'title' => $key
                    ];
                }
            }
        }

        $this->rebuildTable('actions', $data);
    }
}
