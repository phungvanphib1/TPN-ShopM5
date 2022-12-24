<?php

namespace App\Services\Api\Product;

use App\Services\Api\BaseService;
use App\Repositories\Api\Product\ApiProductRepositoryInterface;

class ApiProductService extends BaseService implements ApiProductServiceInterface {

    public $repository;
    public function __construct(ApiProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function search($request)
    {

    }
    public function find($id)
    {

    }
    public function trendingProduct()
    {
        return $this->repository->trendingProduct();
    }
    public function getprdNew()
    {
        return $this->repository->getprdNew();
    }
    public function find_images($id)
    {

    }
}
