<?php

namespace App\Repositories\Interfaces;

use App\Http\Filters\OperationFilter;
use Illuminate\Database\Eloquent\Collection;

interface OperationInterface extends BaseInterface
{
    public function getWithFilterAndPaginate(OperationFilter $filter , int $perPage): Collection;
}
