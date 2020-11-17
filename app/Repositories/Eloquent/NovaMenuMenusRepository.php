<?php

namespace App\Repositories\Eloquent;

use App\Models\Language;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\NovaMenuMenu;
use App\Models\NovaMenuMenuItem;

/**
 * Class RolesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class NovaMenuMenusRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NovaMenuMenu::class;
    }

    public static function getMenu()
    {
        return self::buildTree(self::getById());
    }

    protected static function buildTree(array $elements, $parentId = 0)
    {
        $branch = [];

        foreach ($elements as $element) {
            if($element['value'] != '/') {
                $element['value'] = trim($element['value'], '/');
            }

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

    public static function getById()
    {
        return NovaMenuMenuItem::select(
            'nova_menu_menu_items.*'
        )
            ->where('nova_menu_menu_items.enabled', 1)
            ->where('nova_menu_menu_items.locale', Language::where('id', config()->get('current_language_id'))->first()->code)
            ->groupBy('nova_menu_menu_items.id')
            ->orderBy('nova_menu_menu_items.order', 'ASC')->get()->toArray();
    }
}
