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
                            <label class="form-label" for="nameVi">Loại Sản Phẩm</label>
                            <select class=" form-select" name="category_id" id="category_id" style="width: 470px">
                                <option style="text-align: center" value="">---Loại Sản Phẩm Liên Quan---</option>
                                @foreach ($categories as $category)
                                    <option <?= request()->category_id == $category->id ? 'selected' : '' ?>
                                        value="{{ $category->id }}">{{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="name">Khoảng giá (VND)
                            </label>
                            <input type="number" class="form-control" value="{{ request()->startPrice }}"
                                name="startPrice" id="startPrice" placeholder="Từ">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <label class="form-label" for="name">&nbsp</label>
                            <input type="text" class="form-control" name="endPrice" value="{{ request()->endPrice }}"
                                id="endPrice" placeholder="Đến">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <label class="form-label" for="quantity">Ngày thêm sản phẩm
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
                            <input type="date" value="{{ request()->end_date }}" class="form-control" name="end_date"
                                placeholder="dd/mm/yyyy" class="form-control end_date" value="#">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('products.index') }}" style="float: left" type="submit" class="btn btn-warning">Đặt
                    lại</a>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
        </form>
    </div>
</div>
