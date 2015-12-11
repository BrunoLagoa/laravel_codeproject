<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\User;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeProject\Presenters\UserPresenter;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    protected $fieldSearchable = [
        'name'=>'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
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
        return UserPresenter::class;
    }
}