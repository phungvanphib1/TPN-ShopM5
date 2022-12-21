<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    function getModel()
    {
        return Order::class;
    }

    public function all($request)
    {
       
        $key                    = $request->key;
        $id                     = $request->id;
        $name                   = $request->note;
        $order = $this->model->select('*');

        if ($name) {
            $order->where('note', 'LIKE', '%' . $name . '%');
        }
       
        if ($key) {
            $order->orWhere('id', $key);
            $order->orWhere('note', 'LIKE', '%' . $key . '%');
        }
        if ($id) {
            $order->where('id', $id);
        }

        if (!empty($request->search)) {
            $search = $request->search;
            $order = $order->Search($search);
            
        }

        if (!empty($request->customer_id)) {
            $order->NameCate($request)
            ->filterDate(request(['start_date', 'end_date']));

        }
        $order->filterDate(request(['start_date', 'end_date']));
        return $order->orderBy('id', 'DESC')->paginate(5);
    }
    public function topProduct(){
        $topProducts = DB::table('order_detail')
            ->leftJoin('products', 'products.id', '=', 'order_detail.product_id')
            ->selectRaw('products.*, sum(order_detail.quantity) totalProduct, sum(order_detail.total) totalPrice')
            ->groupBy('order_detail.product_id')
            ->orderBy('totalProduct', 'desc')
            ->take(5)
            ->get();
        return $topProducts;

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
