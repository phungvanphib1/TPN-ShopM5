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

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Hiện</th>
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $key => $group)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $group->name }}</td>
                                        <<td>{{ count($group->users) }} Người</td>
                                            <td>
                                                <form action="{{ route('group.restore', $group->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    @if (Auth::user()->hasPermission('Group_restore'))
                                                        <button type="submit" class="btn btn-info">Khôi Phục</button>
                                                    @else
                                                    <i data-bs-toggle="tooltip" data-bs-placement="top" title="Bạn không có quyền làm điều này!">
                                                        <button type="button" class="btn btn-info" disabled>Khôi
                                                            Phục</button>
                                                    </i>
                                                    @endif
                                                    @if (Auth::user()->hasPermission('Group_forceDelete'))
                                                        <a data-href="{{ route('group.forcedelete', $group->id) }}"
                                                            id="{{ $group->id }}"
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
                            </tbody>
                        </table>
                        <a href="{{ route('group.index') }}" class="btn btn-secondary">Quay Lại</a>
                        <div style="float:right">
                            {{ $groups->onEachSide(5)->links() }}
                        </div>
                    </div>
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
