<?php

namespace CodeProject\Repositories;

use CodeProject\Presenters\ProjectFilePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeProject\Entities\ProjectFile;

/**
 * Class ProjectFileRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectFileRepositoryEloquent extends BaseRepository implements ProjectNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectFile::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return ProjectFilePresenter::class;
    }
}
