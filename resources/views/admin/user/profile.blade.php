@extends('admin.layout.master')
@section('content')
    <style>
        img#avtshow {
            border: 3px solid rgb(150, 0, 0);
            padding: 10px;
            height: 250px;
            width: 250px;
            border-radius: 50%;

        }
    </style>
    <div class="card">
        <div class="card-body">
            <br>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay Lại</a>
            <h2 class="offset-4">
                Thông tin chi tiết
            </h2>
            <div class="row">
                <div class="col-sm-3">
                    <div class="gallery-grid">
                        <br>
                        <a class="example-image-link" href="{{ asset($users->image) }}" data-lightbox="example-set"
                            data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                            <img src="{{ asset($users->image) }}" id="avtshow">
                            <div class="captn">
                                {{-- <h4>Xem Avt</h4> --}}
                            </div>
                        </a>
                    </div>
                    <div class="panel-body">
                        <hr>
                        <h3 style="color: red">{{ $users->name }}</h3>
                        <ul class="nav nav-pills nav-stacked labels-info ">
                            <li>
                                <h6>{{ $users->groups->name }}</h6>
                            </li>
                        </ul>
                        <hr>
                    </div>
                    <div class="text-center">
                        <a class="btn mini btn-default" href="#">
                            <i class="fa fa-cog"> Mật Khẩu </i>
                        </a>
                        <a class="btn mini btn-default" href="#">
                            <i class="fa fa-cog">Mật khẩu*</i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-9">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Thông
                                tin</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Khác</button>
                        </li>
                        @if(Auth()->user()->id ==  $users->id )
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Thay đổi
                                mật khẩu</button>
                        </li>
                        @endif
                        @if (Auth::user()->hasPermission('User_adminupdatepass'))
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-change-password-by-mail">Admin đổi mật khẩu</button>
                        </li>
                        @endif
                    </ul>



                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            @if (Session::has('success'))
                                <p class="text-success"><i class="fa fa-check" aria-hidden="true"></i>
                                    {{ Session::get('success') }}
                                </p>
                            @endif
                            @if (Session::has('error'))
                                <p class="text-danger"><i class="bi bi-x-circle"></i>
                                    {{ Session::get('error') }}
                                </p>
                            @endif
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Họ tên</h5>
                                </div>
                                <div class="col-sm-9">
                                    <h3>{{ $users->name }}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Email</h3>
                                </div>
                                <div class="col-sm-9">
                                    <h3>{{ $users->email }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Số điện thoại</h3>
                                </div>
                                <div class="col-sm-9">
                                    <h3>{{ $users->phone }}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Giới tính</h3>
                                </div>
                                <div class="col-sm-9">
                                    <h3>{{ $users->gender }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Ngày sinh</h3>
                                </div>
                                <div class="col-sm-9">
                                    <h3>{{ $users->birthday }}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Địa chỉ</h3>
                                </div>
                                <div class="col-sm-9">
                                    <h4>{{ $users->address }}</h4>
                                    <h5>{{ $users->wards->name }}/ {{ $users->districts->name }}/
                                        {{ $users->provinces->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content pt-2">
                        <div class="tab-pane profile-edit" id="profile-edit">
                            @if (Session::has('success'))
                                <p class="text-success"><i class="fa fa-check" aria-hidden="true"></i>
                                    {{ Session::get('success') }}
                                </p>
                            @endif
                            @if (Session::has('error'))
                                <p class="text-danger"><i class="bi bi-x-circle"></i>
                                    {{ Session::get('error') }}
                                </p>
                            @endif
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Mã số {{ $users->groups->name }}</h5>
                                </div>
                                <div class="col-sm-9">
                                    <h3>#0068{{ $users->id }}</h3>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Gia nhập TPNShop</h3>
                                </div>
                                <div class="col-sm-9">
                                    <small id="" class="form-text text-muted">Năm-Tháng-Ngày Giờ-Phút-Giây</small>
                                    <h3>{{ $users->created_at }}</h3>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    {{-- ================================ --}}
                    <div class="tab-content pt-2" >
                        <div class="tab-pane profile-change-password" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form action="{{route('user.change_password', Auth()->user()->id)}}" method="post">
                          @method('POST')
                          @csrf
                          <div class="row mb-3">
                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="password" type="password" class="form-control" id="currentPassword">
                              @error('password')
                              <div class="text text-danger">{{ $message }}</div>
                          @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="newpassword" type="password" class="form-control" id="newPassword">
                              @error('newpassword')
                              <div class="text text-danger">{{ $message }}</div>
                          @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu mới</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                              @error('renewpassword')
                              <div class="text text-danger">{{ $message }}</div>
                          @enderror
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
                          </div>
                        </form><!-- End Change Password Form -->
                      </div>
                    </div>

                    <div class="tab-content pt-2" >
                        <div class="tab-pane profile-change-password" id="profile-change-password-by-mail">
                        <!-- Change Password Form -->
                       <h3>Đổi mật khẩu của : {{ $users->name }}</h3>
                        <form action="{{route('user.adminUpdatePass',  $users->id)}}" method="post">
                          @method('PUT')
                          @csrf
                          <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="newpassword" type="password" class="form-control" id="newPassword">
                              @error('newpassword')
                              <div class="text text-danger">{{ $message }}</div>
                          @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu mới</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                              @error('renewpassword')
                              <div class="text text-danger">{{ $message }}</div>
                          @enderror
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
                          </div>
                        </form><!-- End Change Password Form -->
                      </div>
                    </div>

                </div>
            </div>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @php
       if(Session::has('saipass')){
       @endphp
       Swal.fire({
            icon: 'error',
            title: 'Sai mật khẩu mất rồi!',
            text: "Có thể liên hệ với SpAdmin để được cấp lại mật khẩu nhé♥",
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp
        @php
       if(Session::has('sainhap')){
       @endphp
       Swal.fire({
            icon: 'error',
            title: 'Ốiii!',
            text: "Vui lòng nhập lại trùng khớp nhé!",
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp
        @php
       if(Session::has('chuanhap')){
       @endphp
       Swal.fire({
            icon: 'error',
            title: 'Ốii dồi ôiii !!!',
            text: " Nhập lại đủ trường bạn yêu nhé!",
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp
        </script>
        @endsection
