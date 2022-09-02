<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method  filter(\App\Http\Filters\ProductFilter $filter)
 * @property integer $id
 * @property float $price
 * @property boolean $status
 */
class Operation extends Model
{
    use HasFactory,Filterable;

    protected $guarded =[];
}
