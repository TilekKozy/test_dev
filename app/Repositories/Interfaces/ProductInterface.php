<?php

namespace App\Repositories\Interfaces;

use App\Http\Filters\ProductFilter;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductInterface extends BaseInterface
{
    public function getWithFilterAndPaginate(ProductFilter $filter , int $perPage): LengthAwarePaginator;
}
