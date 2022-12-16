@extends('admin.layout.master')
@section('content')


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sản Phẩm</h5>
                        <a href="{{ route('products.create') }}"> Thêm Sản Phẩm </a>

                        <table class="table" style="text-align: center">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                     <td>
                                        <img style="width:80px; height:100px" src="{{ asset($product->image) }}">
                                    </td>

                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post" >
                                            @method('DELETE')
                                            @csrf
                                         <a href="{{ route('products.edit', $product->id) }}" class ='btn btn-warning' > Sửa </a>
                                        <button onclick="return confirm('Bạn có chắc muốn đưa danh mục này vào thùng rác không?');" class ='btn btn-danger'  type="submit" >Xóa</button>
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
