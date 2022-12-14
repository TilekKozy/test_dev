<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\Api\Product\ProductStoreRequest;
use App\Http\Requests\Api\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;

class ProductController extends BaseController
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
    public function index(ProductFilter $filter) : JsonResponse
    {
        return $this->jsonResponse(
            $this->repository->getWithFilterAndPaginate($filter , 10)
        );
    }

    /**
     * @param ProductStoreRequest $request
     * @return JsonResponse
     */
    public function store(ProductStoreRequest $request) : JsonResponse
    {
        return $this->jsonResponse(
            $this->repository->create($request->all())
        );
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product) : JsonResponse
    {

        return $this->jsonResponse(
            $this->repository->getById($product->id)
        );
    }

    /**
     * @param ProductUpdateRequest $request
     * @param int $product
     * @return JsonResponse
     */
    public function update(ProductUpdateRequest $request, int $product) : JsonResponse
    {
        return $this->jsonResponse([
            'status'=> $this->repository->update($product , $request->all())
            ]
        );
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product) : JsonResponse
    {
        return $this->jsonResponse([
                'status'=> $this->repository->deleteById($product->id)
            ]);
    }



}
