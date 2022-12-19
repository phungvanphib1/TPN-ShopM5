<?php

namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Image_product;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    function getModel()
    {
        return Product::class;
        // return Category::class;
    }

    public function all($request)
    {
        $key                    = $request->key;
        $id                     = $request->id;
        $name                   = $request->name;
        $products = $this->model->select('*');

        if ($name) {
            $products->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($key) {
            $products->orWhere('id', $key);
            $products->orWhere('name', 'LIKE', '%' . $key . '%');
        }
        if ($id) {
            $products->where('id', $id);
        }

        if (!empty($request->search)) {
            $search = $request->search;
            $products = $products->Search($search);
        }

        if (!empty($request->category_id)) {
            $products->NameCate($request)
                ->filterPrice(request(['startPrice', 'endPrice']))
                ->filterDate(request(['start_date', 'end_date']));
        }

        $products->filterPrice(request(['startPrice', 'endPrice']));
        $products->filterDate(request(['start_date', 'end_date']));

        return $products->orderBy('id', 'DESC')->paginate(5);
    }

    public function create($data)
    {

        // dd($data);
        // try {
        //create product
        $products = $this->model;
        $products->name = $data['name'];
        $products->price = $data['price'];
        $products->quantity = $data['quantity'];
        $products->description = $data['description'];
        $products->category_id = $data['category_id'];
        $products->view_count = 1;



        // $products->created_by = Auth::user()->id;
        if ($data['image']) {
            $file = $data['image'];
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . date('mdYHis') . uniqid() . '.' . $extension;
            $path = 'storage/' . $file->store('/images', 'public');
            $products->image = $path;
        }
        $products->save();
        if ($data['file_names']) {
            foreach ($data['file_names'] as $file_detail) {
                // File::delete($product->file_names()->file_name);
                $detail_path = 'storage/' . $file_detail->store('/images', 'public');
                $products->image_products()->saveMany([
                    new Image_product([
                        'product_id' => $products->id,
                        'image' => $detail_path,
                    ]),
                ]);
            }
        }
        return true;
        // } catch (\Exception $e) {
        //     Log::error($e->getMessage());
        //     return false;
        // }

        return $products;
    }
    public function update($id, $data)
    {
        // dd($data);
        try {
            //create product
            $products = $this->model->find($id);
            $products->name = $data['name'];
            $products->price = $data['price'];
            $products->quantity = $data['quantity'];
            $products->description = $data['description'];
            $products->category_id = $data['category_id'];
            // $products->image = $data['image'];
            // dd($data);
            // $products->created_by = Auth::user()->id;
            if (isset($data['image'])) {
                $file = $data['image'];
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . date('mdYHis') . uniqid() . '.' . $extension;
                $path = 'storage/' . $file->store('/images', 'public');
                $products->image = $path;
            }
            //create specifications

            $products->save();
            if (isset($fileExtension)) {
                Storage::delete($products);
            }
            //create product_images
            if ($data['file_names']) {
                $items = Image_product::where('product_id', '=', $products->id)->get();
                foreach ($items as $item) {
                    $im = 'public/images/product/' . $item->image;
                    Storage::delete($im);
                }
                Image_product::where('product_id', '=', $products->id)->delete();
                foreach ($data['file_names'] as $file_detail) {
                    // File::delete($product->file_names()->file_name);
                    $detail_path = 'storage/' . $file_detail->store('/products', 'public');
                    $products->image_products()->saveMany([
                        new Image_product([
                            'file_name' => $detail_path,
                        ]),
                    ]);
                }
            }
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        // $products->save();

        return $products;
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
