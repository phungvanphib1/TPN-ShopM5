<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use App\Repositories\BaseRepository;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{

    function getModel()
    {
        return Customer::class;
    }

    public function all($request)
    {
        $key                    = $request->key ?? '';
        $id                     = $request->id ?? '';
        $name                   = $request->name ?? '';
        // thực hiện query
        $query = Customer::select('*');
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
            $query->orWhere('id', 'LIKE', '%' . $key . '%');

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
