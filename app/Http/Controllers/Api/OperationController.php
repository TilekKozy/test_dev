<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\OperationFilter;
use App\Http\Requests\Api\Operation\BuyRequest;
use App\Repositories\OperationRepository;
use App\Services\BalanceService;
use Illuminate\Http\JsonResponse;

class OperationController extends Controller
{

    private OperationRepository $repository;
    private BalanceService $userBalanceService;

    public function __construct(OperationRepository $repository,BalanceService $userBalanceService)
    {
        $this->repository = $repository;
        $this->userBalanceService = $userBalanceService;
    }


    /**
     * @param OperationFilter $filter
     * @return JsonResponse
     */
    public function index(OperationFilter $filter) : JsonResponse
    {
        return response()->json(
            $this->repository->getWithFilterAndPaginate($filter , 10)
        );
    }

    /**
     * @param BuyRequest $request
     * @return JsonResponse
     */
    public function buy(BuyRequest $request) : JsonResponse
    {
        $status = $this->userBalanceService->buyProduct($request->all());
        if($status){
            return response()->json(['status'=>'success']);
        }else{
//            или можно написать что недостаточно баланса
            return response()->json(['status'=>'error']);
        }

    }

}
