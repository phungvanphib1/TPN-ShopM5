@extends('admin.layout.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <div class="page-inner">
                        <header class="page-title-bar">
                            <h2 class="offset-4">
                                Đăng kí tài khoản nhân viên
                            </h2>
                            <br>
                        </header>
                        <div class="page-section">
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <legend>Thông tin cơ bản</legend>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                                    <input name="email" type="text" class="form-control"
                                                        value="{{ old('email') }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('email')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="tf1">Mật Khẩu<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <input name="password" type="text" class="form-control"
                                                        value="">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('password')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="tf1">Họ Và Tên<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <input name="name" type="text" class="form-control"
                                                        value="{{ old('name') }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('name')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Số Điện Thoại<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="phone"
                                                        type="number" class="form-control" value="{{ old('phone') }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('phone')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <br>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label" for="flatpickr01">Chức Vụ<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="group_id" id="" class="form-control">
                                                    <option value="">--Vui lòng chọn--</option>
                                                    @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('group_id')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label class="control-label" for="flatpickr01">Giới Tính<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="gender" id="" class="form-control">
                                                    <option value="">--Vui lòng chọn--</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                    <option value="Khác">Khác</option>
                                                </select>
                                                @if ('gender')
                                                    <p style="color:red">{{ $errors->first('gender') }}</p>
                                                @endif

                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Ngày sinh<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="birthday"
                                                        type="date" class="form-control" value="{{ old('birthday') }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('birthday')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tỉnh/Thành phố</label>
                                                    <select name="province_id" id="province_id"
                                                        class="form-control province_id" aria-label="Default select example"
                                                        data-toggle="select2">
                                                        <option selected="" value="">Vui lòng chọn</option>
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">{{ $province->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('province_id')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Quận/Huyện</label>
                                                    <select name="district_id" id="district_id"
                                                        class="form-control district_id"
                                                        aria-label="Default select example">
                                                        <option selected="" value="">Vui lòng chọn</option>
                                                    </select>
                                                    @error('district_id')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phường/Xã</label>
                                                    <select name="ward_id" class="form-control ward_id"
                                                        aria-label="Default select example" id="ward_id">
                                                        <option selected="" value="">Vui lòng chọn</option>
                                                    </select>
                                                    @error('ward_id')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Địa chỉ chi tiết<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="address"
                                                        type="text" class="form-control"
                                                        value="{{ old('address') }}">
                                                    <small id="" class="form-text text-primary">Ví dụ: Số 20/Hai Bà Trưng... </small>
                                                    @error('address')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label">Ảnh đại diện</label>
                                                <input accept="image/*" type='file' id="inputFile" name="image"
                                                    class="form-control @error('image') is-invalid @enderror"><br>
                                                @error('image')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                                <br>
                                                <img type="hidden" width="120px" height="120px" id="blah"
                                                    src="" alt="" />
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <br><br><br><br>
                                            <button class="btn btn-primary" type="submit">Đăng ký</button>
                                            <a class="btn btn-danger" href="{{ route('users.index') }}">Hủy</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '.province_id', function() {
                var province_id = $(this).val();
                var district_name = $('.district_id').find('option:selected').text();
                console.log(district_name);
                console.log(province_id);
                if (province_id == '') {
                    $('#province_id').notify("Lỗi:Địa chỉ không được để trống", {
                        globalPosition: 'top left',
                    });
                    return false;
                }
                $.ajax({
                    url: "{{ route('user.GetDistricts') }}",
                    type: "GET",
                    data: {
                        province_id: province_id
                    },
                    success: function(data) {
                        console.log(data);
                        var html = '<option value="">Vui lòng chọn</option>';
                        $.each(data, function(key, v) {
                            console.log(v);
                            html += '<option value=" ' + v.province_id + ' "> ' + v
                                .name + '</option>';
                        });
                        $('.district_id').html(html);
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#district_id, .payment', function() {
                var district_id = $(this).val();
                var ward_id = $(this).val();
                var ward_name = $('.ward_id').find('option:selected').text();
                if (district_id == '') {
                    $('#district_id').notify("Lỗi:Địa chỉ không được để trống", {
                        globalPosition: 'top left',
                    });
                    return false;
                }
                if (ward_id == '') {
                    $('#ward_id').notify("Lỗi:Địa chỉ không được để trống", {
                        globalPosition: 'top left',
                    });
                    return false;
                }
                $.ajax({
                    url: "{{ route('user.getWards') }}",
                    type: "GET",
                    data: {
                        district_id: district_id
                    },
                    success: function(data) {
                        console.log(data);
                        var html = '<option value="">Vui lòng chọn</option>';
                        $.each(data, function(key, v) {
                            html += '<option value =" ' + v.id + ' "> ' + v.name +
                                '</option>';
                        });
                        $('#ward_id').html(html);
                    }
                })
            });
        });
        jQuery(document).ready(function() {
            if ($('#blah').hide()) {
                $('#blah').hide();
            }
            jQuery('#inputFile').change(function() {
                $('#blah').show();
                const file = jQuery(this)[0].files;
                if (file[0]) {
                    jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
                    jQuery('#blah1').attr('src', URL.createObjectURL(file[0]));
                }
            });
        });
    </script>
@endsection
