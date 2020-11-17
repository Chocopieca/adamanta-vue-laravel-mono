<?php
namespace App\Services\ModuleData;

use App\Models\Blog;
use App\Models\BlogViewed;
use App\Repositories\Eloquent\BlogsRepository;

class BlogService
{
    public static function handler($slug)
    {
        $blog = BlogsRepository::getBySlug($slug);

        $setting = \SettingsService::getByKey('blogsMetaTagsTemplate')->data;
        if(isset($setting[app()->getLocale()])) {
            foreach ($setting[app()->getLocale()] as $key => $meta) {
                $blog->{$key} = str_replace(
                    ['{$blogTitle}'],
                    [$blog->title],
                    empty($blog->{$key}) ? $meta : $blog->{$key}
                );
            }
        }

        // Mark as viewed
        $ip = request()->ip();
        $user = auth('api')->user();
        $userId = isset($user->id) ? $user->id : null;

        $blogViewed = BlogViewed::where('blog_id', $blog->id)
            ->where(function($query) use($userId, $ip) {
                $query->where('ip', $ip);

                if(!is_null($userId)) {
                    $query->orWhere('user_id', $userId);
                }
            })
            ->count();

        if($blog && !$blogViewed) {
            BlogViewed::create(['user_id' => $userId, 'blog_id' => $blog->id, 'ip' => $ip]);
            Blog::where(['id' => $blog->id])->increment('views');
        }

        return $blog;
    }
}
