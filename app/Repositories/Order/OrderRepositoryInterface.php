<?php
namespace App\Repositories\Order;

use App\Repositories\RepositoryInterface;

interface OrderRepositoryInterface extends RepositoryInterface{
    public function all($request);
    public function getTrash();
    public function restore($id);
    public function forceDelete($id);
}
