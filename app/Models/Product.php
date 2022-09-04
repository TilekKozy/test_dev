<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method  filter(\App\Http\Filters\ProductFilter $filter)
 * @property integer $id
 * @property string $name
 * @property integer $price
 */
class Product extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'price'
    ];
}
