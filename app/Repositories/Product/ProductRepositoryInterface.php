<?php
namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface{
    public function all($request);
    public function getTrash();
    public function restore($id);
    public function forceDelete($id);
}
