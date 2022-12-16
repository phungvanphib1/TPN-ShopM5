<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    function getModel()
    {
        return Category::class;
    }

    public function all($request)
    {
        $key                    = $request->key ?? '';
        $id                     = $request->id ?? '';
        $name                   = $request->name ?? '';
        // thực hiện query
        $query = Category::select('*');
        $query->orderBy('id', 'DESC');
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('name', 'LIKE', '%' . $key . '%');
        }
        //Phân trang
        return $query->paginate(5);
    }
    public function getTrash()
    {
        $query = $this->model->onlyTrashed();
        $query->orderBy('id', 'desc');
        $category = $query->paginate(5);
        return $category;
    }
    public function restore($id)
    {
        $category = $this->model->withTrashed()->findOrFail($id);
        $category->restore();
        return $category;
    }
    public function forceDelete($id)
    {
        $categories = $this->model->onlyTrashed()->findOrFail($id);
        $categories->forceDelete();
        return $categories;
    }

}
