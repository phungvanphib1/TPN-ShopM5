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
                                <label class="form-label" for="nameVi">Tên khách hàng</label>
                                <input type="text" class="form-control" value="{{ request()->nameCus }}"
                                    name="nameCus" id="nameCus" placeholder="Nhập tên khách hàng cần tìm">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Số điện thoại</label>
                                <input type="text" class="form-control" value="{{ request()->phoneCus }}"
                                    name="phoneCus" id="phoneCus" placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Khoảng giá đơn hàng
                                </label>
                                <input type="number" class="form-control" value="{{ request()->startPrice }}"
                                    name="startPrice" id="startPrice" placeholder="Từ">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="name">&nbsp</label>
                                <input type="text" class="form-control" name="endPrice"
                                    value="{{ request()->endPrice }}" id="endPrice" placeholder="Đến">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="quantity">Ngày đặt hàng
                                </label>
                                <input type="date" name="start_date" placeholder="dd/mm/yyyy"
                                    class="form-control start_date" value="{{ request()->start_date }}"
                                    min="{{ Carbon\Carbon::now()->firstOfYear()->format('d-m-Y') }}"
                                    max="{{ Carbon\Carbon::now()->lastOfYear()->format('d-m-Y') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="quantity">&nbsp</label>
                                <input type="date" value="{{ request()->end_date }}" class="form-control"
                                    name="end_date" placeholder="dd/mm/yyyy" class="form-control end_date"
                                    value="#">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('orders.index') }}" style="float: left" type="submit" class="btn btn-warning">Đặt
                        lại</a>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
</div>
