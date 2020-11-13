<?php

namespace App\Traits;

use App\Models\Language;

trait SiteMapTrait
{
    public static function generate($data, $fileName, $urlPref = '')
    {
        $siteMap = \Spatie\Sitemap\SitemapGenerator::create(env('FRONT_URL'))->getSitemap();

        $checkLang = Language::where('active', 1)->count() > 1;

        if($checkLang) {
            $data->with('languages');
        }

        if(!empty($urlPref)) {
            $urlPref = $urlPref . '/';
        }

        foreach ($data->get() as $item) {
            if(!empty($item->slug)) {
                $slug = $item->slug == '/' ? '' : $item->slug;

                $add = \Spatie\Sitemap\Tags\Url::create(env('FRONT_URL') . '/' . $urlPref . $slug)
                    ->setPriority(0.5)
                    ->setLastModificationDate($item->updated_at);

                if ($checkLang && isset($item->languages)) {
                    foreach ($item->languages as $lang) {
                        $add->addAlternate(
                            env('FRONT_URL') . '/' . $lang->code . '/' . $urlPref . $slug,
                            $lang->code
                        );
                    }
                }

                $siteMap->add($add);
            }
        }

        $siteMap->writeToFile(base_path('public/sitemap/sitemap-' . $fileName . '.xml'));
    }

    public static function updateLastMode($index = 0)
    {
        $xmlPath = base_path('public/sitemap/sitemap.xml');

        $xml = simplexml_load_file($xmlPath);
        $xml->sitemap[$index]->lastmod = date('c', time());
        $xml->asXML($xmlPath);
    }
}
