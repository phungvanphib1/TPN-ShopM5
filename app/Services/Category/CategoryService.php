<?php

namespace App\Services\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Services\BaseService;

class CategoryService extends BaseService implements CategoryServiceInterface {

    public $repository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
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
