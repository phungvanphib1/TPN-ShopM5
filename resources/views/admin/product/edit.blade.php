@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Chỉnh sửa sản phẩm
                        </h2>
                        <br>
                        <!-- General Form Elements -->
                        <form action="{{ route('products.update', [$product->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="tf1">Tên Sản phẩm*</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $product->name }}" placeholder="Nhập Tên Sản Phẩm">
                                        @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="tf1">Loại Sản Phẩm*</label>
                                        <select name="category_id" class="form-select">
                                            </option>
                                            @foreach ($categories as $category)
                                                <option <?= $category->id == $product->category_id ? 'selected' : '' ?>
                                                    value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="tf1"> Số lượng<abbr name="Trường bắt buộc">*</abbr></label> <input
                                            name="quantity" type="number" class="form-control"
                                            value="{{ $product->quantity }}">
                                        <small id="" class="form-text text-muted"></small>
                                        @error('quantity')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="tf1">Giá<abbr name="Trường bắt buộc">*</abbr></label> <input
                                            name="price" type="number" class="form-control"
                                            value="{{ $product->price }}">
                                        <small id="" class="form-text text-muted"></small>
                                        @error('price')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="tf1">Mô tả sản phẩm*</label>
                                <textarea name="description" class="form-control" id="ckeditor1" rows="4" style="resize: none">{!! $product->description !!}</textarea>
                                <small id="" class="form-text text-muted"></small>
                                @error('description')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="inputText">Ảnh Sản Phẩm*</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('category_id') is-invalid @enderror"
                                            accept="image/*" type='file' id="inputFile" name="image" />
                                        <br>
                                        <br>
                                        <img type="hidden" width="100px" height="100px" id="blah1"
                                            src="{{ asset($product->image) }}" alt="" />
                                        @error('image')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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
