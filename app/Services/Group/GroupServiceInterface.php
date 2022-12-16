<?php
namespace App\Services\Group;

use App\Services\ServiceInterface;

interface GroupServiceInterface extends ServiceInterface
{
    public function getTrash();
    public function restore($id);
    public function forceDelete($id);
}
