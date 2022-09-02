<?php

namespace App\Jobs;

use App\Models\Operation;
use App\Models\Product;
use App\Repositories\OperationRepository;
use App\Repositories\ProductRepository;
use App\Services\BalanceService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserBuyProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data ;
    protected Product $product ;
    protected OperationRepository $repository;
    protected ProductRepository $productRepository;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data, Product $product ,)
    {
        $this->data = $data;
        $this->product = $product;
        $this->productRepository = new ProductRepository();
        $this->repository = new OperationRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->repository->create([
            'user_id' => $this->data['user_id'],
            'product_id' => $this->data['product_id'],
            'price' => $this->product->price,
            'status'=>$this->data['status']
        ]);

        if($this->data['status']){
            (new BalanceService())->outcome($this->data['user_id'], $this->product->price);
        }
    }
}
