<?php

namespace App\Services\Group;

use App\Services\ServiceInterface;

interface GroupServiceInterface extends ServiceInterface
{
    public function getTrash();
    public function restore($id);
    public function forceDelete($id);
    public function detail($id);
    public function group_detail($id, $request);
}
