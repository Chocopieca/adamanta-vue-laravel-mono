<?php

namespace App\Policies;

use App\Repositories\Eloquent\TabsRepository;
use Illuminate\Auth\Access\HandlesAuthorization;

class NovaPolicy
{
    use HandlesAuthorization;

    public function viewAny()
    {
        $tabs = TabsRepository::getForPolicy();

        if(isset($tabs[request()->resource])) {
            return $tabs[request()->resource] > 0 ? true : false;
        }

        return true;
    }

    public function view()
    {
        return true;
    }

    public function create()
    {
        return true;
    }

    public function update()
    {
        return true;
    }

    public function delete()
    {
        return true;
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