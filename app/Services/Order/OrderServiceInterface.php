<?php
namespace App\Services\Order;

use App\Services\ServiceInterface;

interface OrderServiceInterface extends ServiceInterface
{
    public function getTrash();
    public function orderWait();
    public function orderBrowser();
    public function orderCancel();
    public function topProduct();
    public function restore($id);
    public function forceDelete($id);
}
