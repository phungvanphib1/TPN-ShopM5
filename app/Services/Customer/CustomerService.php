<?php

namespace App\Services\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Services\BaseService;

class CustomerService extends BaseService implements CustomerServiceInterface {

    public $repository;
    public function __construct(CustomerRepositoryInterface $customerService)
    {
        $this->repository = $customerService;
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
