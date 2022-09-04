<?php

namespace App\Repositories\Interfaces;

use App\Http\Filters\OperationFilter;
use Illuminate\Pagination\LengthAwarePaginator;

interface OperationInterface extends BaseInterface
{
    public function getWithFilterAndPaginate(OperationFilter $filter , int $perPage): LengthAwarePaginator;
}
