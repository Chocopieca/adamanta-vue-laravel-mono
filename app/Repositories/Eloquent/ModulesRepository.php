<?php

namespace App\Repositories\Eloquent;

use App\Services\ModuleDataService;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Module;

/**
 * Class PagesRepository
 * @package namespace App\Repositories\Eloquent;
 */
class ModulesRepository extends BaseRepository
{
    protected static $getALL = false;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Module::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public static function getForPage($pageId)
    {
        $modules = Module::select('modules.*')
            ->leftJoin('page_modules as pm', function ($query) use ($pageId) {
                $query->on('pm.module_id', '=', 'modules.id')
                    ->where('pm.enabled', '=', 1);
            })
            ->where('pm.page_id', '=', $pageId)
            ->orWhere('modules.for_all', '=', 1)
            ->orderBy('pm.order', 'ASC')
            ->orderBy('modules.order', 'ASC')
            ->get()->toArray();

        $response = [
            'top' => [],
            'bottom' => []
        ];

        $ordering = [
            ['for_all' => 1, 'position' => 1],
            ['for_all' => 0, 'position' => 1],
            ['for_all' => 0, 'position' => 0],
            ['for_all' => 1, 'position' => 0]
        ];

        foreach ($ordering as $order) {
            foreach ($modules as $module) {
                if ($module['for_all'] == $order['for_all'] && $module['position'] == $order['position']) {
                    $module['data'] = ModuleDataService::{'get' . $module['key']}();
                    $response[($module['position'] ? 'top' : 'bottom')][$module['key']] = $module;
                }
            }
        }

        return $response;
    }
}
