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
            $query->where('status', '=', '1')->where('quantity', '>', '0')
            ->whereRaw("name Like '%" . $data . "%' ")
            ;
        }
        return $query->get();
    }
    public function find($id)
    {
        $product= DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*',  'categories.name as cateName')->where('products.id','=',$id)->get();
        return $product;
    }
    public function trendingProduct()
    {
       
    }
    public function find_images($id)
    {
        $product= DB::table('products')
        ->join('image_products', 'products.id', '=', 'image_products.product_id')
        ->select('image_products.image as image_products')->where('image_products.product_id','=',$id)->get();
        return $product;
    }
}