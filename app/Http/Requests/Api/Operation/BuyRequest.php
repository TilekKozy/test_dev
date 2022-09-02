<?php

namespace App\Http\Requests\Api\Operation;

use App\Http\Requests\BaseRequest;

class BuyRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'=>'required|integer',
            'product_id'=>'required|integer',
        ];
    }
}
