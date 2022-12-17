@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <br>
            <h2 class="offset-4">
                Thông tin chi tiết
            </h2>
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image"> <img style="margin-top:50px" src="{{ asset($users->image) }}"
                                id="main_user_image" height="412" width="412">
                        </div><br>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                            <table class="table table">
                                <tbody>
                                    <tr>
                                        <td>Mã nhân viên</td>
                                        <td>{{ $users->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tên nhân viên</td>
                                        <td>{{ $users->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Chức vụ</td>
                                        <td>{{ $users->groups->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>{{ $users->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td>{{ $users->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh</td>
                                        <td>{{ $users->birthday }}</td>
                                    </tr>
                                    <tr>
                                        <td>Giới tính</td>
                                        <td>{{ $users->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tỉnh/Thành</td>
                                        <td>{{ $users->provinces->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Quận/Huyện</td>
                                        <td>{{ $users->districts->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phường/Xã</td>
                                        <td>{{ $users->wards->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td>{{ $users->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
