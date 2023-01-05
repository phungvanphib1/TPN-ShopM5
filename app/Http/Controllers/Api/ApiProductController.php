<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Api\Product\ApiProductServiceInterface;
use Illuminate\Http\Request;
class ApiProductController extends Controller
{
    private $productService;
    public function __construct(ApiProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }
    //danh sách sản phẩm
    public function product_list()
    {
        $products = $this->productService->getAll();

        return response()->json($products, 200);
    }
    //tìm kiếm
    public function search(Request $request)
    {
        $products = $this->productService->search($request);
        return response()->json($products, 200);
    }
    //chi tiết sản phẩm
    public function product_detail($id)
    {
        $products = $this->productService->find($id);
        return response()->json($products, 200);
    }
    //hình ảnh chi tiết
    public function image_detail($id)
    {
        $products = $this->productService->find($id);
        return response()->json($products, 200);
    }
    //loại sản phẩm
    public function category_list()
    {
        $categories = Category::with('products')->take(10)->get();
        return response()->json($categories, 200);
    }
    // sản phẩm hot
    public function trendingProduct(){
        $products = $this->productService->trendingProduct();
        return response()->json($products, 200);
    }
    // sản phẩm mới
    public function productNew(){
        $products = $this->productService->getprdNew();
        return response()->json($products, 200);
    }
}
