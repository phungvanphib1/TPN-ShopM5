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

    }
    public function find($id)
    {

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
    public function find_images($id)
    {

    }
}
