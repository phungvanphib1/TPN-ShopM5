@extends('admin.layout.master')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div  class="card-body">
                    <br>
                    <h2 class="offset-4">
                        Sản Phẩm
                    </h2>
                    <br>

                    <a class="btn btn-primary" href="{{ route('products.create') }}"> Thêm Sản Phẩm </a>
                    <a onclick="return confirm('Bạn có muốn tiếp tục điều này hay không?')" class="btn btn-info" href="{{ route('products.exportExcel') }}"> Xuất file exel </a>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#searchModal">Tìm chi tiết</button>
                    @include('admin.product.advanceSearch')
                        <table  class="table" style="text-align: center">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Loại</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <th class="item-{{ $product->id }}" scope="row">{{ ++$key }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        @if ($product->category)
                                            <td>{{ $product->category->name }}</td>
                                        @else
                                            <td style="color: red">Loại này đã bị xóa|
                                                <span>id:{{ $product->category_id }}</span>
                                            </td>
                                        @endif
                                        <td>
                                            <img style="width:80px; height:100px" src="{{ asset($product->image) }}">
                                        </td>

                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class='btn btn-warning'> Sửa </a>
                                                <button
                                                    onclick="return confirm('Bạn có chắc muốn đưa danh mục này vào thùng rác không?');"
                                                    class='btn btn-danger' type="submit">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float:right">
                            {{ $products->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
