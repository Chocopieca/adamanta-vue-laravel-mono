<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageModuleSubPage;
use App\Repositories\Eloquent\PagesRepository;
use App\Repositories\Eloquent\ModulesRepository;

class SefController extends ResponseApiController
{
    public function __invoke($entity = '')
    {
        $uri = collect(explode('/', explode('/filter=', $entity)[0]));

        if($uri->count() == 1) {

            $page = PagesRepository::getPage($uri->first());

            // Render page if found
            if ($page) {
                if ($page['home']) {
                    $breadcrumbs = [['url' => '/', 'title' => $page['title']]];
                } else {
                    $breadcrumbs = [
                        ['url' => '/', 'title' => PagesRepository::getPage()['title']],
                        ['url' => '', 'title' => $page['title']]
                    ];
                }

                return response()->json([
                    'breadcrumbs' => $breadcrumbs,
                    'show_breadcrumbs' => $page['show_title'],
                    'page' => $page,
                    'modules' => ModulesRepository::getForPage($page['id'])
                ]);
            }
        }

        // Render sub page if found
        $subPage = PageModuleSubPage::select('page_module_sub_pages.*', 'pm.page_id', 'mp.key')
            ->where('slug', $uri->first())
            ->leftJoin('page_modules as pm', 'pm.id', '=', 'page_module_sub_pages.page_module_id')
            ->leftJoin('module_sub_pages as mp', 'mp.id', '=', 'page_module_sub_pages.sub_page_module_id')
            ->first();

        if (isset($subPage->page_id)) {
            // Get data for current module
            $class = '\App\Services\ModuleData\\' . $subPage->key . 'Service';
            $page = class_exists($class) ? $class::handler($uri->last()) : false;

            if($page) {
                $parent = Page::select('pages.slug', 'pd.title')
                    ->where('pages.id', $subPage->page_id)
                    ->leftJoin('page_descriptions as pd', function ($query) {
                        $query->on('pd.page_id', '=', 'pages.id')
                            ->where('pd.language_id', '=', config()->get('current_language_id'));
                    })
                    ->first();

                $breadcrumbs = [
                    ['url' => '/', 'title' => PagesRepository::getPage()['title']],
                    ['url' => '/' . $parent->slug, 'title' => $parent->title],
                ];

                if (isset($page->slug)) {

                    // TODO This temporary
                    $slug = $subPage->slug;
                    if($subPage->slug == 'reader') {
                        $slug = 'book';
                        $page->no_index = true;
                    }

                    array_push(
                        $breadcrumbs,
                        ['url' => '/' . $slug . '/' . $page->slug, 'title' => $page->title]
                    );
                }

                if (isset($page->breadcrumbs)) {
                    $breadcrumbs = array_merge($breadcrumbs, $page->breadcrumbs);
                }

                return response()->json([
                    'breadcrumbs' => $breadcrumbs,
                    'show_breadcrumbs' => true,
                    'page' => $page,
                    'module' => ['name' => $subPage->key]
                ]);
            }
        }

        abort(404);
    }
}
