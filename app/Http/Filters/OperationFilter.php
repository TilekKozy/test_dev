<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class OperationFilter extends Filter
{


    /**
     * @param string|null $value
     * @return Builder
     */
    public function status(string $value = null): Builder
    {
        return $this->builder->where('status', $value);
    }


    /**
     * Sort the products by the given order and field.
     *
     * @param  array  $value
     * @return Builder
     */
    public function sort(array $value = []): Builder
    {
        if (isset($value['by']) && ! Schema::hasColumn('products', $value['by'])) {
            return $this->builder;
        }

        return $this->builder->orderBy(
            $value['by'] ?? 'created_at', $value['order'] ?? 'desc'
        );
    }
}
