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

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    public function __construct(ProductServiceInterface  $productService ,CategoryServiceInterface $categoryService)
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
        $products = Product::all();
        $categories = Category::all();
        $products = $this->productService->all($request);
        return view('admin.product.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $params = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view('admin.product.add',$params);
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
        // dd($data);
        try {
        $this->productService->create($data);
        $notification = [
            'message' => 'Thêm loại sản phẩm thành công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('products.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.store.error'));
            Log::error('message:'. $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $products = $this->productService->find($id);
        return view('admin.product.edit' , compact('products','categories')) ;
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
        try{
            $this->productService->update( $id, $data);
            $notification = [
                'message' => 'Cập nhật thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('products.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.update.error'));
            Log::error('message:'. $e->getMessage());
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
            $products = $this->productService->delete($id);
            return redirect()->route('products.index');
    }

    public function trash(){
        $products = $this->productService->getTrash();
        return view('admin.product.trash', compact('products'));
    }

    public function restore($id){
            $this->productService->restore($id);
            return redirect()->route('product.trash');
    }

    public function forcedelete($id){
            $this->productService->forceDelete($id);
            return redirect()->route('product.trash');
    }
}
