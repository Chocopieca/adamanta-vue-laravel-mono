<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Language;
/**
 * Class LanguagesRepositoryEloquent
 * @package namespace App\RepositoriesEloquent;
 */
class LanguagesRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Language::class;
    }

    public static function getActive()
    {
        return Language::select('id', 'title', 'code', 'iso_code')->where('active', 1)->get();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
