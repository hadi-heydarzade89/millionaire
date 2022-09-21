<?php

namespace App\Repositories;

use App\Repositories\contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * @inheritdoc
     */
    public function index(): LengthAwarePaginator
    {
        return $this->model->orderBy('created_at', 'desc')->paginate(config('app.per_page'));
    }

}
