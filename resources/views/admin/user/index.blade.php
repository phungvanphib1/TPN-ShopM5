@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Nhân viên
                        </h2>
                        <a class="btn btn-primary" href="{{ route('users.create') }}"> Đăng kí tài khoản </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên Nhân Viên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Tùy Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}"><img style="width:80px; height:100px" src="{{ asset($user->image) }}"></a>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('users.edit', $user->id) }}" class='btn btn-warning'> Sửa
                                                </a>
                                                <button
                                                    onclick="return confirm('Bạn có chắc muốn xóa nhân viên này không?');"
                                                    class='btn btn-danger' type="submit">Xóa</button>
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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
