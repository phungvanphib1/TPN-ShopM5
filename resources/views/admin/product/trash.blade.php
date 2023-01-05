@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Thùng rác
                        </h2>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Loại Sản Phẩm</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        @if ($product->category)
                                            <td>{{ $product->category->name }}</td>
                                        @else
                                            <td style="color: red">Kiểm tra thùng rác Loại/
                                                <span>id:{{ $product->category_id }}</span>
                                            </td>
                                        @endif
                                        <td>
                                            <img style="width:80px; height:100px" src="{{ asset($product->image) }}">
                                        </td>
                                        <td>
                                            <form action="{{ route('product.restore', $product->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                @if (Auth::user()->hasPermission('Product_restore'))
                                                    <button type="submit" class="btn btn-info">Khôi Phục</button>
                                                @else
                                                <i data-bs-toggle="tooltip" data-bs-placement="top" title="Bạn không có quyền làm điều này!">
                                                    <button type="button" class="btn btn-info" disabled>Khôi Phục</button>
                                                </i>
                                                @endif
                                                @if (Auth::user()->hasPermission('Product_forceDelete'))
                                                    <a data-href="{{ route('product.forcedelete', $product->id) }}"
                                                        id="{{ $product->id }}"
                                                        class="btn btn-danger sm deleteIcon">Xóa</a>
                                                @else
                                                <i data-bs-toggle="tooltip" data-bs-placement="top" title="Bạn không có quyền làm điều này!">
                                                    <button type="button" class="btn btn-danger" disabled>Xóa</button>
                                                </i>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay Lại</a>
                        </tbody>
                        <div style="float:right">
                            {{ $products->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).on('click', '.deleteIcon', function(e) {
            // e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            console.log(id);
            Swal.fire({
                title: 'Bạn có chắc không?',
                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'delete',
                        data: {
                            _token: csrf
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Tệp của bạn đã bị xóa!',
                                'success'
                            )
                            $('.item-' + id).remove();
                        }
                    })
                    window.location.reload();
                }
            })
        });
    </script>
@endsection
