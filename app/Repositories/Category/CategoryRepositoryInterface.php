<?php
namespace App\Repositories\Category;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface{
    public function all($request);
    public function getTrash();
    public function restore($id);
    public function forceDelete($id);
}
