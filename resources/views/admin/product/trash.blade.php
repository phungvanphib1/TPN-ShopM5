@extends('admin.layout.master')
@section('content')


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thùng Rác</h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Giá Sản Phẩm</th>
                                    <th scope="col">Loại Sản Phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>#</td>
                                    <td>
                                        <form action="{{ route('product.restore', $product->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                        <button type="submit" onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này không?');"
                                         class ='btn btn-info'>Khôi phục</button>
                                        </form>
                                        <form action="{{ route('product.forcedelete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button type="submit" onclick="return confirm('Bạn có chắc xóa không');"
                                         class ='btn btn-danger'>Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
