@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>
                        <!-- General Form Elements -->
                        <form action="{{ route('products.update', [$products->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $products->name }}"
                                        placeholder="Nhập Tên Loại Sản Phẩm" class="form-control">
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Giá Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" value="{{ $products->price }}"
                                        placeholder="Nhập Tên Loại Sản Phẩm" class="form-control">
                                    @error('price')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Số Lượng Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" name="quantity" value="{{ $products->quantity }}"
                                        placeholder="Nhập Tên Loại Sản Phẩm" class="form-control">
                                    @error('quantity')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Mô Tả Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" value="{{ $products->description }}"
                                        placeholder="Nhập Tên Loại Sản Phẩm" class="form-control">
                                    @error('description')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Loại Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Hình Ảnh Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('category_id') is-invalid @enderror"
                                            accept="image/*" type='file' id="inputFile" name="image" />
                                        <br>
                                        <br>
                                        <img type="hidden" width="200px" height="200px" id="blah1" src="{{ asset($products->image) }}" alt="" />
                                    @error('image')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Thêm Vào</button>
                                    <a href="{{ route('products.index') }}" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
