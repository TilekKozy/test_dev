<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\BaseRequest;

class ProductStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|integer'
        ];
    }
}
