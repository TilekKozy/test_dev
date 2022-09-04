<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property float $price
 * @property boolean $status
 * @method filter(\App\Http\Filters\OperationFilter $filter)
 */
class Operation extends Model
{
    use HasFactory,Filterable;

    protected $guarded =[];
}
