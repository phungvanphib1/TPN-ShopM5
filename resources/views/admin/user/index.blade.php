@extends('admin.layout.master')
@section('content')
    <style>
        img#avt {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
        }
    </style>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Nhân viên
                        </h2>
                        @if (Auth::user()->hasPermission('User_create'))
                            <a class="btn btn-primary" href="{{ route('users.create') }}"> Đăng kí tài khoản </a>
                        @else
                            <i data-bs-toggle="tooltip" data-bs-placement="top" title="Bạn không có quyền làm điều này!">
                                <button type="button" class="btn btn-primary" disabled>Đăng kí tài khoản</button>
                            </i>
                        @endif
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#searchModal">Tìm chi tiết</button>
                        @include('admin.user.advanceSearch')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Hình đại diện</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Chức vụ</th>
                                    <th scope="col">Liên hệ</th>
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>
                                            @if (Auth::user()->hasPermission('User_view'))
                                                <a href="{{ route('users.show', $user->id) }}"><img id="avt"
                                                        src="{{ asset($user->image) }}"></a>
                                            @else
                                                <a href="#"><img id="avt" src="{{ asset($user->image) }}"></a>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->groups->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if (Auth::user()->hasPermission('User_update'))
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class='btn btn-warning'>Sửa</a>
                                            @else
                                                <button type="button" class="btn btn-warning" disabled>Sửa</button>
                                            @endif
                                            @if (Auth::user()->hasPermission('User_delete'))
                                                <a data-href="{{ route('users.destroy', $user->id) }}"
                                                    id="{{ $user->id }}" class="btn btn-danger sm deleteIcon">Xóa</a>
                                            @else
                                                <button type="button" class="btn btn-danger" disabled>Xóa</button>
                                            @endif

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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
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
