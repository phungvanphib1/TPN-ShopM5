@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Chỉnh Sửa Nhóm Quyền
                        </h2>
                        <br>
                        <form action="{{ route('group.update', [$group->id]) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tên Loại Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $group->name }}"
                                        placeholder="Nhập Tên Loại Sản Phẩm" class="form-control">
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Thêm Vào</button>
                                    <a href="{{ route('group.index') }}" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                        </form>>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
