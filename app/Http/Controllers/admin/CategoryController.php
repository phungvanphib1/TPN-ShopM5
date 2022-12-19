<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Category::class);
        $categories = $this->categoryService->all($request);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();
        try {
            $this->categoryService->create($data);
            $notification = [
                'message' => 'Thêm loại sản phẩm thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.store.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('category.index')->with($notification);
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
        $category = $this->categoryService->find($id);
        $this->authorize('update', Category::class);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->categoryService->update($id, $data);
            $notification = [
                'message' => 'Cập nhật thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.update.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('category.index')->with($notification);
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
        $this->authorize('delete', Category::class);
        try {
            $category = $this->categoryService->delete($id);
            $notification = [
                'message' => 'Đã chuyển vào thùng rác!',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.index')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.destroy.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('category.index')->with($notification);
        }
    }

    public function trash()
    {
        $categories = $this->categoryService->getTrash();
        return view('admin.category.trash', compact('categories'));
    }

    public function restore($id)
    {
        $this->authorize('restore', Category::class);
        try {
            $this->categoryService->restore($id);
            $notification = [
                'message' => 'Khôi phục thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.trash')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.restore.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('category.trash')->with($notification);
        }
    }

    public function forcedelete($id)
    {
        $this->authorize('forceDelete', Category::class);
        try {
            $this->categoryService->forceDelete($id);
            $notification = [
                'message' => 'Loại sản phẩm đã bị xóa!',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.trash')->with($notification);
        } catch (\Exception $e) {
            Session::flash('error', config('define.forceDelete.error'));
            Log::error('message:' . $e->getMessage());
            $notification = [
                'message' => 'có lôi say ra!',
                'alert-type' => 'error'
            ];
            return redirect()->route('category.trash')->with($notification);
        }
    }
}
