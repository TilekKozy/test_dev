<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{

    /**
     * @param mixed $data
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    public function jsonResponse(mixed $data = [], int $status = 200, array $headers = [], int $options = 0): JsonResponse
    {
        return response()->json($data,$status,$headers,$options);
    }

}
