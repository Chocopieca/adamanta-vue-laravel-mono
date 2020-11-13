<?php

namespace CustomComponent\AccessControl\Models;

use Illuminate\Database\Eloquent\Model;

class Tabs extends Model
{
    protected $fillable = [
        'id',
        'parent_id',
        'icon',
        'active',
        'position',
        'order',
        'verify'
    ];

    public static function getTabs()
    {
        $data = request()->all();

        $query = self::select(
            'tabs.id',
            'tabs.name',
            'tabs.icon',
            'tabs.active',
            'tabs.parent_id',
            \DB::raw('IF(rtt.tab_id > 0, 1, 0) as permission')
        );

        if (isset($data['admin_id']) && $data['admin_id'] != 0) {
            $query->leftJoin(
                \DB::raw(
                    '(SELECT tab_id, admin_id
                    FROM admin_to_tabs
                    WHERE admin_id = ' . $data['admin_id'].') as rtt'
                ),
                function ($join) {
                    $join->on('tabs.id', '=', 'rtt.tab_id');
                }
            );
        } else {
            $query->leftJoin(
                \DB::raw(
                    '(SELECT tab_id, role_id
                    FROM roles_to_tabs
                    WHERE role_id = ' . ($data['role_id'] ?? 1) . ') as rtt'
                ),
                function ($join) {
                    $join->on('tabs.id', '=', 'rtt.tab_id');
                }
            );
        }

        return $query
            ->groupBy('tabs.id')
            ->orderBy('tabs.order', 'ASC')->get();
    }

    public static function getTabsForActions()
    {
        return self::select('tabs.id', 'tabs.name')
            ->leftJoin('actions as a', 'a.tab_id', '=', 'tabs.id')
            ->where('a.id', '>', 0)
            ->groupBy('tabs.id')->get();
    }
}
