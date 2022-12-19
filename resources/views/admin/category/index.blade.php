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
                        @if (Auth::user()->hasPermission('Category_create'))
                            <a class="btn btn-primary" href="{{ route('category.create') }}"> Thêm Loại Sản Phẩm </a>
                        @else
                            <button type="button" class="btn btn-primary" disabled>Thêm Loại Sản Phẩm</button>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Hiện số lượng sản phẩm</th>
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td></td>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>#</td>
                                        {{-- <td>{{ count($category->products) }}</td> --}}
                                        <td>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                @if (Auth::user()->hasPermission('Category_update'))
                                                    <a href="{{ route('category.edit', $category->id) }}"
                                                        class='btn btn-warning'> Sửa </a>
                                                @else
                                                    <button type="button" class="btn btn-warning" disabled>Sửa</button>
                                                @endif
                                                @if (Auth::user()->hasPermission('Category_delete'))
                                                    <button
                                                        onclick="return confirm('Bạn có chắc muốn đưa danh mục này vào thùng rác không?');"
                                                        class='btn btn-danger' type="submit">Xóa</button>
                                                @else
                                                    <button type="button" class="btn btn-danger" disabled>Xóa</button>
                                                @endif
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
