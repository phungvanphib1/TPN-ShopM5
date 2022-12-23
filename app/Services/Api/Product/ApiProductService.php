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

    }
    public function find_images($id)
    {
        
    }
}