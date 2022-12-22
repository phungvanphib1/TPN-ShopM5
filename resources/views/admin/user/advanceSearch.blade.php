<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tìm kiếm chi tiết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Mã nhân viên</label>
                                <input type="text" class="form-control" value="{{ request()->iduser }}"
                                    name="iduser" id="iduser" placeholder="Nhập mã ">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Tên nhân viên</label>
                                <input type="text" class="form-control" value="{{ request()->nameuser }}"
                                    name="nameuser" id="nameuser" placeholder="Nhập tên nhân viên cần tìm">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Số điện thoại</label>
                                <input type="text" class="form-control" value="{{ request()->phoneuser }}"
                                    name="phoneuser" id="phoneuser" placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Chức vụ</label>
                                <select class=" form-select" name="groupuser" id="groupuser" style="width: 470px">
                                    <option style="text-align: center" value="">---Chức vụ liên quan---</option>
                                    @foreach ($groups as $group)
                                        <option <?= request()->groupuser == $group->id ? 'selected' : '' ?>
                                            value="{{ $group->id }}">{{ $group->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <a href="{{ route('users.index') }}" style="float: left" type="submit" class="btn btn-warning">Đặt
                        lại</a>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
</div>
