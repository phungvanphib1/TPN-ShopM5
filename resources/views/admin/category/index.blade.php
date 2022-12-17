@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Loại Sản Phẩm
                        </h2>
                        <a class="btn btn-primary" href="{{ route('category.create') }}"> Thêm Loại Sản Phẩm </a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Hiện</th>
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td></td>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ count($category->products) }} Sản phẩm</td>
                                        <td>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('category.edit', $category->id) }}"
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
                            {{ $categories->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
