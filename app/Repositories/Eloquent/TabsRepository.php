<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Tabs;

/**
 * Class RolesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TabsRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tabs::class;
    }

    public static function getMenu()
    {
        return self::buildTree(self::getById(Auth::user()));
    }

    protected static function buildTree(array $elements, $parentId = 0)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public static function getById($user)
    {
        return Tabs::select(
            'tabs.id',
            'tabs.parent_id',
            'tabs.name',
            'tabs.path',
            'tabs.icon',
            'tabs.active'
        )
            ->leftJoin('roles_to_tabs as rtt', 'tabs.id', '=', 'rtt.tab_id')
//            ->leftJoin('users_to_tabs as utt', 'tabs.id', '=', 'utt.tab_id')
            ->where(function ($query) use ($user) {
                $query->orWhere([
                    'rtt.role_id' => $user->role_id,
//                    'utt.user_id' => $user->id
                ]);
            })
            ->groupBy('tabs.id')
            ->orderBy('tabs.order', 'ASC')->get()->toArray();
    }

    public static function getForPolicy()
    {
        $dbTabs = Tabs::select(
            'tabs.path',
            \DB::raw('(SELECT COUNT(id) FROM roles_to_tabs WHERE tabs.id = tab_id AND role_id = ' . auth()->user()->role_id.') as access')
        )
            ->groupBy('tabs.id')
            ->get();

        $tabs = [];
        foreach ($dbTabs as $tab) {
            $path = explode('/', $tab->path);
            $tabs[end($path)] = $tab->access;
        }

        return $tabs;
    }
}
