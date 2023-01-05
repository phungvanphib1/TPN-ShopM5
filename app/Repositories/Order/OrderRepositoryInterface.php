<?php
namespace App\Repositories\Order;

use App\Repositories\RepositoryInterface;

interface OrderRepositoryInterface extends RepositoryInterface{
    public function all($request);
    public function orderBrowser();
    public function orderCancel();
    public function orderWait();
    public function topProduct();
    public function getTrash();
    public function restore($id);
    public function forceDelete($id);
}
