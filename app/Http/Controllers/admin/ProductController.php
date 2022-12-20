<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Services\Category\CategoryServiceInterface;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Exports\ProductsExport;
use App\Models\Image_product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    public function __construct(ProductServiceInterface  $productService, CategoryServiceInterface $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Product::class);
        $products = Product::all();
        $categories = Category::get();
        $products = $this->productService->all($request);
        $params = [
            'categories' => $categories,
            'products' => $products
        ];
        return view('admin.product.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        $products = Product::all();
        $categories = Category::all();
        $params = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view('admin.product.add', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        try {
            $this->productService->create($data);
            $notification = [
                'message' => 'Thêm sản phẩm thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('products.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.store.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi xay ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('products.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::get();
        $products = $this->productService->find($id);
        return view('admin.product.show',compact('products','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Product::class);
        $categories = Category::get();
        $product = $this->productService->find($id);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->productService->update($id, $data);
            $notification = [
                'message' => 'Cập nhật thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('products.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.update.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('products.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Product::class);
        try {
            $product = $this->productService->delete($id);
            $notification = [
                'message' => 'Sản phẩm đã vào thùng rác!',
                'alert-type' => 'success'
            ];
            return redirect()->route('products.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.destroy.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('products.index')->with($notification);
        }
    }

    public function trash()
    {
        $products = $this->productService->getTrash();
        return view('admin.product.trash', compact('products'));
    }

    public function restore($id)
    {
        $this->authorize('restore', Product::class);
        try {
            $this->productService->restore($id);
            $notification = [
                'message' => 'Đã khôi phục sản phẩm!',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.trash')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.restore.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('product.trash')->with($notification);
        }
    }
    public function exportExcel(){
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function forcedelete($id)
    {
        try {
            $this->authorize('forceDelete', Product::class);
            $this->productService->forceDelete($id);
            $notification = [
                'message' => 'Đã xóa sản phẩm',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.trash')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.forceDelete.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('product.trash')->with($notification);
        }
    }

}
