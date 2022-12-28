<?php

namespace App\Repositories\Api\Product;

use App\Models\Product;
use App\Repositories\Api\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiProductRepository extends BaseRepository implements ApiProductRepositoryInterface
{

    function getModel()
    {
        return Product::class;
    }
    public function getAll()
    {
        $products = $this->model->all();
        return $products;
    }
    public function search($request)
    {
        $query = $this->model::query();
        $data = $request->input('search');
        if ($data) {
            $query->whereRaw("name Like '%" . $data . "%' ")
                ->orWhereRaw("price Like '%" .$data . "%' ")
                ->orWhereRaw("description Like '%" .$data . "%' ")
            ;
        }
        return $query->get();
    }
    public function find($id)
    {
        $product =  $this->model->with([
            'category' => function ($query) {
                $query->select('id', 'name');
            },
            'image_products' => function ($query) {
                $query->select('id', 'product_id', 'image');
            }
        ])->find($id);
        return $product;
    }
    public function trendingProduct()
    {
        $toptrending = DB::table('products')
            ->Join('order_detail', 'products.id', '=', 'order_detail.product_id')
            ->selectRaw('products.*, count(order_detail.product_id) as totalBy')
            ->groupBy('products.id')
            ->orderBy('totalBy', 'desc')
            ->take(4)
            ->get();
        return $toptrending;
    }

    public function getprdNew()
    {
        $products = $this->model->select('*');
        return $products->orderBy('id', 'DESC')->take(6)->get();
    }
    public function find_images($id)
    {
        $product = DB::table('products')
            ->join('image_products', 'products.id', '=', 'image_products.product_id')
            ->select('image_products.image as image_products')->where('image_products.product_id', '=', $id)->get();
        return $product;
    }
}
