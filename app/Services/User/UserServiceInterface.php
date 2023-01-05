<?php

namespace App\Services\User;

use App\Services\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    public function SoftDeletes($id);
    public function restore($id);
    public function trash($request);
    public function deletes($id);
    public function provinces();
    public function districts();
    public function wards();
}
