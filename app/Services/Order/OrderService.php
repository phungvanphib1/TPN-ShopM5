<?php

namespace App\Services\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Services\BaseService;

class OrderService extends BaseService implements OrderServiceInterface {

    public $repository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->repository = $orderRepository;
    }
    public function all($request)
    {
        return $this->repository->all($request);
    }
    public function update($id, $data){
        return $this->repository->update($id, $data);
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    public function getTrash()
    {
        return $this->repository->getTrash();
    }
    public function restore($id){
        return $this->repository->restore($id);
    }
    public function forceDelete($id){
        return $this->repository->forceDelete($id);
    }

}
