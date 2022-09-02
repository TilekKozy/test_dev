<?php

namespace App\Repositories;

use App\Http\Filters\ProductFilter;
use App\Models\Product;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Pagination\LengthAwarePaginator;


final class ProductRepository extends BaseRepository implements ProductInterface
{
    public function __construct()
    {
        $this->model = new Product();
    }

    public function getWithFilterAndPaginate(ProductFilter $filter , int $perPage): LengthAwarePaginator
    {
        return $this->model->filter($filter)->paginate($perPage);
    }

}
