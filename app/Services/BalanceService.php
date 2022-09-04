<?php

namespace App\Services;

use App\Jobs\UserBuyProductJob;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class BalanceService
{
    private UserRepository $repository;
    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->productRepository = new ProductRepository();
    }

    /**
     * @param int $id
     * @param float $amount
     * @return bool
     */
    public function income(int $user_id, float $amount): bool
    {
        $user = $this->repository->getById($user_id);
        return $this->repository->update($user_id, ['balance' => ($user->balance + $amount)]);
    }

    /**
     * @param int $id
     * @param float $amount
     * @return bool
     */
    public function outcome(int $user_id, float $amount): bool
    {
        $user = $this->repository->getById($user_id);
        return $this->repository->update($user_id, ['balance' => ($user->balance - $amount)]);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function buyProduct(array $data): bool
    {
        $user = $this->repository->getById($data['user_id']);
        $product = $this->productRepository->getById($data['product_id']);
        $data['status'] = ($user->balance >= $product->price);
        UserBuyProductJob::dispatch($data, $product);

        return $data['status'];
    }
}
