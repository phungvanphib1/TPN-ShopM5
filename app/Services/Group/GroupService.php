<?php

namespace App\Services\Group;

use App\Repositories\Group\GroupRepositoryInterface;
use App\Services\BaseService;

class GroupService extends BaseService implements GroupServiceInterface
{

    public $repository;
    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->repository = $groupRepository;
    }
    public function all($request)
    {
        return $this->repository->all($request);
    }
    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }
    public function create($data)
    {
        return $this->repository->create($data);
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
    public function forceDelete($id)
    {
        return $this->repository->forceDelete($id);
    }
    public function detail($id)
    {
        return $this->repository->detail($id);
    }
    public function group_detail($id, $request)
    {
        return $this->repository->group_detail($id, $request);
    }
}
