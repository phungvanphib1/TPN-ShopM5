<?php
namespace App\Repositories\Customer;

use App\Repositories\RepositoryInterface;

interface CustomerRepositoryInterface extends RepositoryInterface{
    public function all($request);
    public function getTrash();
    public function restore($id);
    public function forceDelete($id);
}
