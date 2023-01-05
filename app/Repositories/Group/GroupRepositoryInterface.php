<?php

namespace App\Repositories\Group;

use App\Repositories\RepositoryInterface;

interface GroupRepositoryInterface extends RepositoryInterface
{
    public function softDeletes($id);
    public function restore($id);
    public function trash($request);
    public function deletes($id);
    public function forceDelete($id);
    public function detail($id);
    public function group_detail($id, $request);
}
