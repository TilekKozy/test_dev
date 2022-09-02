<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Api\Product\ProductStoreRequest;
use App\Http\Requests\Api\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{

    private ProductRepository $repository;


    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param ProductFilter $filter
     * @return JsonResponse
     */
    public function index(ProductFilter $filter)
    {
        return response()->json(
            $this->repository->getWithFilterAndPaginate($filter , 10)
        );
    }

    /**
     * @param ProductStoreRequest $request
     * @return JsonResponse
     */
    public function store(ProductStoreRequest $request)
    {
        return response()->json(
            $this->repository->create($request->all())
        );
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {

        return response()->json(
            $this->repository->getById($product->id)
        );
    }

    /**
     * @param ProductUpdateRequest $request
     * @param int $product
     * @return JsonResponse
     */
    public function update(ProductUpdateRequest $request, int $product)
    {
        return response()->json([
            'status'=> $this->repository->update($product , $request->all())
            ]
        );
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        return response()->json([
                'status'=> $this->repository->deleteById($product->id)
            ]
        );
    }



}
