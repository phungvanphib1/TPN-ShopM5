@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Danh Sách Đơn Hàng
                        </h2>
                        <br>
                        <a onclick="return confirm('Bạn có muốn tiếp tục điều này hay không?')" class="btn btn-info" href="{{ route('orders.exportExcel') }}"> Xuất file excel  </a>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#searchModal">Tìm chi tiết</button>
                        @include('admin.order.advanceSearch')
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item offset-7">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#orderall">Tất
                                        Cả</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#order-choduyet">Chờ
                                        Duyệt</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#order-daduyet">Đã
                                        Duyệt</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#order-dahuy">Đã
                                        Hủy</button>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active profile-overview" id="orderall">
                                    {{-- <table class="table datatable"> --}}
                                        <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên Khách Hàng</th>
                                                <th scope="col">Số Điện Thoại</th>
                                                <th scope="col">Ghi Chú</th>
                                                <th scope="col">Ngày Đặt</th>
                                                <th scope="col">Trạng Thái</th>
                                                <th scope="col">Duyệt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $key => $order)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ $order->customer->name }}</td>
                                                    <td>{{ $order->customer->phone }}</td>
                                                    <td>{{ $order->note }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>
                                                        @if ($order->status === 0)
                                                            <h4 style="color: silver"><i
                                                                    class="bi bi-bookmark-plus-fill"></i></h4>
                                                        @endif
                                                        @if ($order->status === 1)
                                                            <h4 style="color: green"><i
                                                                    class="bi bi-bookmark-check-fill"></i></h4>
                                                        @endif
                                                        @if ($order->status === 2)
                                                            <h4 style="color: red"><i class="bi bi-bookmark-x-fill"></i>
                                                            </h4>
                                                        @endif
                                                    </td>
                                                    <td><a class='btn btn-warning'
                                                            href="{{ route('orders.show', $order->id) }}">Chi
                                                            tiết</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- ========== --}}
                            <div class="tab-content">
                                <div class="tab-pane fade show profile-overview" id="order-choduyet">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên Khách Hàng</th>
                                                <th scope="col">Số Điện Thoại</th>
                                                <th scope="col">Ghi Chú</th>
                                                <th scope="col">Ngày Đặt</th>
                                                <th scope="col">Trạng Thái</th>
                                                <th scope="col">Duyệt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderWait as $key => $wait)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ $wait->customer->name }}</td>
                                                    <td>{{ $wait->customer->phone }}</td>
                                                    <td>{{ $wait->note }}</td>
                                                    <td>{{ $wait->created_at }}</td>
                                                    <td>
                                                        @if ($wait->status === 0)
                                                            <h4 style="color: silver"><i
                                                                    class="bi bi-bookmark-plus-fill"></i></h4>
                                                        @endif
                                                        @if ($wait->status === 1)
                                                            <h4 style="color: green"><i
                                                                    class="bi bi-bookmark-check-fill"></i></h4>
                                                        @endif
                                                        @if ($wait->status === 2)
                                                            <h4 style="color: red"><i class="bi bi-bookmark-x-fill"></i>
                                                            </h4>
                                                        @endif
                                                    </td>
                                                    <td><a class='btn btn-warning'
                                                            href="{{ route('orders.show', $wait->id) }}">Chi
                                                            tiết</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- ====== --}}
                            <div class="tab-content">
                                <div class="tab-pane fade show profile-overview" id="order-daduyet">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên Khách Hàng</th>
                                                <th scope="col">Số Điện Thoại</th>
                                                <th scope="col">Ghi Chú</th>
                                                <th scope="col">Ngày Đặt</th>
                                                <th scope="col">Trạng Thái</th>
                                                <th scope="col">Duyệt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderBrowser as $key => $browser)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ $browser->customer->name }}</td>
                                                    <td>{{ $browser->customer->phone }}</td>
                                                    <td>{{ $browser->note }}</td>
                                                    <td>{{ $browser->created_at }}</td>
                                                    <td>
                                                        @if ($browser->status === 0)
                                                            <h4 style="color: silver"><i
                                                                    class="bi bi-bookmark-plus-fill"></i></h4>
                                                        @endif
                                                        @if ($browser->status === 1)
                                                            <h4 style="color: green"><i
                                                                    class="bi bi-bookmark-check-fill"></i></h4>
                                                        @endif
                                                        @if ($browser->status === 2)
                                                            <h4 style="color: red"><i class="bi bi-bookmark-x-fill"></i>
                                                            </h4>
                                                        @endif
                                                    </td>
                                                    <td><a class='btn btn-warning'
                                                            href="{{ route('orders.show', $browser->id) }}">Chi
                                                            tiết</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- ========== --}}
                            <div class="tab-content">
                                <div class="tab-pane fade show profile-overview" id="order-dahuy">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên Khách Hàng</th>
                                                <th scope="col">Số Điện Thoại</th>
                                                <th scope="col">Ghi Chú</th>
                                                <th scope="col">Ngày Đặt</th>
                                                <th scope="col">Trạng Thái</th>
                                                <th scope="col">Duyệt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderCancel as $key => $cancel)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ $cancel->customer->name }}</td>
                                                    <td>{{ $cancel->customer->phone }}</td>
                                                    <td>{{ $cancel->note }}</td>
                                                    <td>{{ $cancel->created_at }}</td>
                                                    <td>
                                                        @if ($cancel->status === 0)
                                                            <h4 style="color: silver"><i
                                                                    class="bi bi-bookmark-plus-fill"></i></h4>
                                                        @endif
                                                        @if ($cancel->status === 1)
                                                            <h4 style="color: green"><i
                                                                    class="bi bi-bookmark-check-fill"></i></h4>
                                                        @endif
                                                        @if ($cancel->status === 2)
                                                            <h4 style="color: red"><i class="bi bi-bookmark-x-fill"></i>
                                                            </h4>
                                                        @endif
                                                    </td>
                                                    <td><a class='btn btn-warning'
                                                            href="{{ route('orders.show', $cancel->id) }}">Chi
                                                            tiết</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- ====== --}}
                            {{-- <div style="float:right">
                                {{ $orders->onEachSide(5)->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
