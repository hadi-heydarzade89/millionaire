<?php

namespace App\Repositories\contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator;
}
