<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Page;

/**
 * Class PagesRepository
 * @package namespace App\Repositories\Eloquent;
 */
class PagesRepository extends BaseRepository
{
    protected static $getALL = false;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Page::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public static function getPage($segment = false)
    {
        $page = Page::select(
            'pages.*',
            'pd.title',
            'pd.description',
            'pd.meta_title',
            'pd.meta_description',
            'pd.meta_keywords',
            'pt.key'
        )
            ->leftJoin('page_descriptions as pd', function ($query) {
                $query->on('pd.page_id', '=', 'pages.id')
                    ->where('pd.language_id', '=', config()->get('current_language_id'));
            })
            ->leftJoin('page_types as pt', 'pt.id', '=', 'pages.page_type_id')
            ->where('pages.active', 1);

        if ($segment) {
            $page->where('pages.slug', '=', $segment);
        } else {
            $page->where('pages.home', '=', 1);
        }

        $page = $page->first();

        return $page ? $page->toArray() : false;
    }
}
