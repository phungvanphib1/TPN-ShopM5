@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Thùng Rác
                        </h2>
                        <br>
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
                                        <td>{{ count($category->products) }} sản phẩm
                                        @if (count($category->products) !== 0)
                                        <span style="color: red"> đi kèm!</span>
                                        @endif
                                    </td>
                                        <td>
                                            <form action="{{ route('category.restore', $category->id) }}" method="POST">
                                                @csrf
                                                @method('put')

                                                @if (Auth::user()->hasPermission('Category_restore'))
                                                    <button type="submit" class="btn btn-info">Khôi Phục</button>
                                                @else
                                                <i data-bs-toggle="tooltip" data-bs-placement="top" title="Bạn không có quyền làm điều này!">
                                                    <button type="button" class="btn btn-info" disabled>Khôi Phục</button>
                                                </i>
                                                @endif
                                                {{-- @if (count($category->products) !== 0) --}}
                                                @if (Auth::user()->hasPermission('Category_forceDelete'))
                                                    <a data-href="{{ route('category.forcedelete', $category->id) }}"
                                                        id="{{ $category->id }}"
                                                        class="btn btn-danger sm deleteIcon">Xóa</a>
                                                @else
                                                <i data-bs-toggle="tooltip" data-bs-placement="top" title="Bạn không có quyền làm điều này!">
                                                    <button type="button" class="btn btn-danger" disabled>Xóa</button>
                                                </i>
                                                @endif
                                                {{-- @else
                                                    <span style="color: red" ><button type="button" class="btn btn-danger" disabled>Xóa</button> có sản phẩm đi kèm</span>
                                                @endif --}}

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">Quay lại</a>
                        <div style="float:right">
                            {{ $categories->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
