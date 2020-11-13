<?php

namespace CustomComponent\AccessControl\Http\Controllers;

use Illuminate\Routing\Controller;
use CustomComponent\AccessControl\Models\Action;
use CustomComponent\AccessControl\Models\Tabs;
use CustomComponent\AccessControl\Models\Role;
use CustomComponent\AccessControl\Models\User;

class ActionsController extends Controller
{
    public function get()
    {
        $tabs = Tabs::getTabsForActions();

        return response()->json([
            'actions' => Action::getActions($tabs[0]->id),
            'tabs' => $tabs,
            'roles' => Role::getRoles(),
            'users' => User::getUsers()
        ]);
    }

    public function modify()
    {
        $data = request()->all();

        if ($data['admin_id']) {
            $user = [
                'admin_id' => $data['admin_id'],
                'action_id' => $data['action_id']
            ];

            $query = \DB::table('admin_to_actions');

            $data['access'] ? $query->insert($user) : $query->where($user)->delete();
        } else {
            $role = [
                'role_id' => $data['role_id'],
                'action_id' => $data['action_id']
            ];

            $query = \DB::table('roles_to_actions');

            $data['access'] ? $query->insert($role) : $query->where($role)->delete();
        }
    }
}
