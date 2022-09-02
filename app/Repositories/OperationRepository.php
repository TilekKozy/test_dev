<?php

namespace App\Repositories;

use App\Http\Filters\OperationFilter;
use App\Models\Operation;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Pagination\LengthAwarePaginator;


final class OperationRepository extends BaseRepository implements ProductInterface
{
    public function __construct()
    {
        $this->model = new Operation();
    }

    /**
     * @param OperationFilter $filter
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getWithFilterAndPaginate(OperationFilter|\App\Http\Filters\ProductFilter $filter , int $perPage): LengthAwarePaginator
    {
        return $this->model->filter($filter)->paginate($perPage);
    }
}
