<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    function getModel()
    {
        return Order::class;
    }

    public function all($request)
    {
        $key = $request->key;
        // thực hiện query
        $query = $this->model->select('*');

        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('id', 'LIKE', '%' . $key . '%');
        }
        if ($key) {
            $query->where('key', 'LIKE', '%' . $key . '%');
        }
        //Phân trang
        return $query->orderBy('id', 'DESC')->paginate(5);
    }

    public function orderWait()
    {
        $wait = 0;
        $query = Order::select('*');
        $query->orderBy('id', 'DESC');
        $query->where('status', 'LIKE', '%' . $wait . '%');
        return $query->paginate(5);
    }

    public function orderBrowser()
    {
        $browser = 1;
        $query = Order::select('*');
        $query->orderBy('id', 'DESC');
        $query->where('status', 'LIKE', '%' . $browser . '%');
        return $query->paginate(5);
    }
    public function orderCancel()
    {
        $cancel = 2;
        $query = Order::select('*');
        $query->orderBy('id', 'DESC');
        $query->where('status', 'LIKE', '%' . $cancel . '%');
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
