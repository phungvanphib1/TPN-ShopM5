@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Thêm sản phẩm
                        </h2>
                        <br>
                        <!-- General Form Elements -->
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="tf1">Tên Sản phẩm*</label>
                                        <input name="name" type="text" class="form-control"value="{{ old('name') }}"
                                            placeholder="Nhập Tên Sản Phẩm">
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
                                            <option value="">
                                                <==Vui-lòng-chọn==>
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                            value="{{ old('quantity') }}">
                                        <small id="" class="form-text text-muted"></small>
                                        @error('quantity')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="tf1">Giá<abbr name="Trường bắt buộc">*</abbr></label> <input
                                            name="price" type="number" class="form-control" value="{{ old('price') }}">
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
                                <textarea name="description" class="form-control" value="{{ old('description') }}" id="ckeditor1" rows="4"
                                    style="resize: none"></textarea>
                                <small id="" class="form-text text-muted"></small>
                                @error('description')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="file_name"><b>Ảnh*</b></label>
                                    <input accept="image/*" type='file' id="inputFile" name="image"
                                        class="form-control file_input_image_single" />
                                    <br>
                                    <img type="hidden" width="150px" height="150px" id="blah" src="#"
                                        alt="" />
                                    @error('image')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="file_name"><b>Hình ảnh chi tiết*</b></label>
                                    <div class="card_file_name">
                                        <div
                                            class="form-group form_input @error('file_names') border border-danger @enderror">
                                            <input type="file" name="file_names[]" id="file_name" multiple
                                                class="form-control  @error('file_name') is-invalid @enderror">
                                            <span class="inner">
                                                <span class="select" style="color:red">Ctrl + click để chọn nhiều ảnh</span>
                                            </span>
                                        </div>
                                        <div class="container_image">
                                            @error($errors->any())
                                                <p style="color:red">*{{ $errors->first('file_name') }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Hình Ảnh Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input accept="image/*" type='file' id="inputFile" name="image" />
                                <br>
                                <br>
                                <img type="hidden" width="200px" height="200px" id="blah" src="#"
                                    alt="" />
                                    @error('image')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="file_name">Hình ảnh chi tiết</label>
                                    <div class="col-sm-10">
                                        <div class="form-group form_input @error('file_names') border border-danger @enderror">
                                            <input type="file" name="file_names[]" id="image" multiple
                                            class="form-control files @error('image') is-invalid @enderror">
                                            <span class="inner">
                                                <span class="select" style="color:red">Ctrl + click để chọn nhiều ảnh</span>
                                            </span>
                                        </div>
                                        <div class="container_image">
                                        @error('image')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div> --}}
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
    <script>
        jQuery(document).ready(function() {
            if ($('#blah').hide()) {
                $('#blah').hide();
            }
            jQuery('#inputFile').change(function() {
                $('#blah').show();
                const file = jQuery(this)[0].files;
                if (file[0]) {
                    jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
                    jQuery('#blah1').attr('src', URL.createObjectURL(file[0]));
                }
            });
        });
        jQuery('input#file_name').on('change', function(e) {
            const file = jQuery(this)[0].files;
            image_html = ''
            for (let object of file) {
                image_html +=
                    `<img width="100px" height="100px" id="blah" src="${URL.createObjectURL(object)}" alt="" />`
            }
            $('div.container_image').html(image_html);
        });
    </script>
@endsection
