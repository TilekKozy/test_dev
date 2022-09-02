<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\BaseRequest;

class ProductUpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string',
            'price' => 'integer'
        ];
    }
}
