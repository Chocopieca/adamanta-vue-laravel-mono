<?php

namespace CustomComponent\AccessControl\Http\Controllers;

use Illuminate\Routing\Controller;
use CustomComponent\AccessControl\Models\Tabs;
use CustomComponent\AccessControl\Models\Role;
use CustomComponent\AccessControl\Models\User;

class TabsController extends Controller
{
    public function get()
    {
        return response()->json([
            'tabs' => Tabs::getTabs(),
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
                'tab_id' => $data['tab_id']
            ];

            $query = \DB::table('admin_to_tabs');

            $data['access'] ? $query->insert($user) : $query->where($user)->delete();
        } else {
            $role = [
                'role_id' => $data['role_id'],
                'tab_id' => $data['tab_id']
            ];

            $query = \DB::table('roles_to_tabs');

            $data['access'] ? $query->insert($role) : $query->where($role)->delete();
        }
    }
}
