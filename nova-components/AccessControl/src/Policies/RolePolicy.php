<?php

namespace CustomComponent\AccessControl\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use CustomComponent\AccessControl\Models\Action;

class RolePolicy
{
    use HandlesAuthorization;

    protected $actions;

    public function __construct()
    {

        $this->actions = Action::getUserActions();
    }

    public function viewAny() //access to tab
    {
        return true;
    }

    public function view() //details btn
    {
        return $this->actions['access_role_view'];
    }

    public function create() //create btn
    {
        return $this->actions['access_role_create'];
    }

    public function update() //edit btn
    {
        return $this->actions['access_role_update'];
    }

    public function delete($user, $role)
    {
        return !$this->actions['access_role_delete'] ||
            ($user->role_id == $role->id || $role->not_remove == 1) ? false : true;
    }

    public function restore()
    {
        return true;
    }

    public function forceDelete()
    {
        return true;
    }
}
