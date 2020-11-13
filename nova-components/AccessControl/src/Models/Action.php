<?php

namespace CustomComponent\AccessControl\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected static $getActions = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'tab_id',
        'key',
        'title'
    ];

    public static function getActions($id)
    {
        $data = request()->all();

        if (empty(self::$getActions)) {

            $query = self::select(
                'actions.id',
                'actions.title',
                'actions.key',
                \DB::raw('IF(rtt.action_id > 0, 1, 0) as permission')
            );

            if (isset($data['admin_id']) && $data['admin_id'] != 0) {
                $query->leftJoin(
                    \DB::raw(
                        '(SELECT action_id, admin_id
                    FROM admin_to_actions
                    WHERE admin_id = ' . $data['admin_id'] . ') as rtt'
                    ),
                    function ($join) {
                        $join->on('actions.id', '=', 'rtt.action_id');
                    }
                );
            } else {
                $query->leftJoin(
                    \DB::raw(
                        '(SELECT action_id, role_id
                    FROM roles_to_actions
                    WHERE role_id = ' . ($data['role_id'] ?? 1) . ') as rtt'
                    ),
                    function ($join) {
                        $join->on('actions.id', '=', 'rtt.action_id');
                    }
                );
            }

            self::$getActions = $query->where('actions.tab_id', '=', $data['tab_id'] == 0 ? $id : $data['tab_id'])
                ->groupBy('actions.id')
                ->get();
        }

        return self::$getActions;
    }

    public static function getUserActions()
    {
        $user = \Auth::user();

        $actions = self::select(
            'actions.key',
            'rta.id',
            \DB::raw('IF(rta.action_id > 0 OR uta.action_id > 0, 1, 0) as permission')
        )
            ->leftJoin(
                \DB::raw(
                    '(SELECT id, action_id
                    FROM roles_to_actions
                    WHERE role_id = ' . $user->role_id . ') as rta'
                ),
                'rta.action_id',
                '=',
                'actions.id'
            )
            ->leftJoin(
                \DB::raw(
                    '(SELECT id, action_id
                    FROM admin_to_actions
                    WHERE admin_id = ' . $user->id . ') as uta'
                ),
                'uta.action_id',
                '=',
                'actions.id'
            )
            ->get();

        $res = [];
        foreach ($actions as $val) {
            $res[$val['key']] = $val['id'] ? 1 : 0;
        }

        return $res;
    }
}
