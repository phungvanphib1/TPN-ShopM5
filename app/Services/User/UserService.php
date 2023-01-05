<?php

namespace App\Services\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Services\BaseService;

class UserService extends BaseService implements UserServiceInterface
{

    public $repository;
    public function __construct(UserRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }
    public function all($request)
    {
        return $this->repository->all($request);
    }
    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    public function SoftDeletes($id)
    {
        return $this->repository->softDeletes($id);
    }
    public function restore($id)
    {
        return $this->repository->restore($id);
    }
    public function trash($request)
    {
        return $this->repository->trash($request);
    }
    public function deletes($id)
    {
        return $this->repository->deletes($id);
    }
    public function loginProcessing($data)
    {
        return $this->repository->loginProcessing($data);
    }
    public function logout()
    {
        return $this->repository->logout();
    }
    public function provinces()
    {
        return $this->repository->provinces();
    }
    public function districts()
    {
        return $this->repository->districts();
    }
    public function wards()
    {
        return $this->repository->wards();
    }
}
