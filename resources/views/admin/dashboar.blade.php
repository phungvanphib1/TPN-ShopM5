@extends('admin.layout.master')
@section('content')
    <div class="pagetitle">
        <h1>Trang Tổng Quan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tổng quan</a></li>
                <li class="breadcrumb-item active"><a href="#">Trang chủ</a></li>

            </ol>
        </nav>
    </div>

    {{-- ---------------- --}}
    @php
        $totalAdmin = 0;
    @endphp

    @foreach ($users as $item)
        @if ($item->groups->name == 'Supper Admin')
            @php $totalAdmin = $totalAdmin + 1 @endphp
        @endif
    @endforeach
    {{-- ---------------- --}}

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Đơn Hàng <span>| Tổng</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalOrders }}</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">Đang Tăng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Doanh thu <span>| Tháng</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        @php
                                            $dola = $totalPrice / 23000;
                                        @endphp
                                        <h6>{{ round($dola, 2) }}$</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">Đang tăng</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Revenue Card -->
                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Khách hàng <span>| Tổng</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>264{{ $totalCustomer }}</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span><span
                                            class="text-muted small pt-2 ps-1">Đang tăng</span>
                                        {{-- <span class="text-danger small pt-1 fw-bold">12%</span>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Customers Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Nhân viên <span>| Hệ thống</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <div class="ps-3">

                                        <h6>{{ $totalUser }}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $totalAdmin }}</span> <span
                                            class="text-muted small pt-2 ps-1">SuperAdmin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Customers Card -->
            <!-- Reports -->
            <div class="col-lg-8">

                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Top bán chạy</h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Tên Sản Phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Đã bán</th>
                                        <th scope="col">Doanh Thu</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (isset($topproduct))
                                        @foreach ($topproduct as $product)
                                            <tr>
                                                <th scope="row"><a href="{{ route('products.show', $product->id) }}"><img
                                                            src="{{ asset($product->image) }}" alt=""></a></th>
                                                <td><a data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Chi Tiết Sản Phẩm"
                                                        href="{{ route('products.show', $product->id) }}"
                                                        class="text-primary fw-bold">{{ $product->name }}</a></td>
                                                <td><i data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Giá Sản Phẩm">{{ number_format($product->price) }} <span
                                                            class="badge bg-success rounded-pill">VNĐ</span></i></td>
                                                <td class="fw-bold"><i data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Số Lượng"><span
                                                            class="badge bg-success rounded-pill">{{ $product->total_Product }}
                                                            Chiếc</span></i></td>
                                                <td><i data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Doanh Thu">{{ number_format($product->total_Price) }} <span
                                                            class="badge bg-success rounded-pill">VNĐ</span></i></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Sản Phẩm mới</h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Tên Sản Phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Loại</th>
                                        <th scope="col">Số lượng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (isset($productnew))
                                        @foreach ($productnew as $product)
                                            <tr>
                                                <th scope="row"><a href="{{ route('products.show', $product->id) }}"><img
                                                            src="{{ asset($product->image) }}" alt=""></a></th>
                                                <td><a data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Chi Tiết Sản Phẩm"
                                                        href="{{ route('products.show', $product->id) }}"
                                                        class="text-primary fw-bold">{{ $product->name }}</a></td>
                                                <td><i data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Giá Sản Phẩm">{{ number_format($product->price) }} <span
                                                            class="badge bg-success rounded-pill">VNĐ</span></i></td>
                                                <td class="fw-bold"><i data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Số Lượng"><span
                                                            class="badge bg-success rounded-pill">{{ $product->category->name }}</span></i></td>
                                                <td><i data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Doanh Thu">{{ $product->quantity }}</i></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Đơn hàng gần đây</h5>
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Loại</th>
                                        <th scope="col">Sản Phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <th scope="row"><a href="#">#{{ $key }}</a></th>
                                            <td>{{ $order->cate_id }}</td>
                                            <td><a href="#" class="text-primary">{{ $order->name_Product }}</a></td>
                                            <td>{{ $order->price }}</td>
                                            <td><span class="badge bg-success">còn</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- End Recent Sales -->

            </div>
            <!-- End Left side columns -->
            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Website Traffic -->

                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Báo Cáo Đơn Hàng<span>| Tháng</span></h5>
                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Đơn Hàng',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                                value: {{ $orderWait }},
                                                name: 'Đơn Chờ Duyệt'
                                            },
                                            {
                                                value: {{ $orderBrowser }},
                                                name: 'Đơn Đã Duyệt'
                                            },
                                            {
                                                value: 0,
                                                name: 'Đơn Hoàn'
                                            },
                                            {
                                                value: {{ $orderCancel }},
                                                name: 'Đơn Đã Hủy'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>
                    </div>
                </div>
                <!-- End Website Traffic -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Khách hàng <span>| Thân Thiết</span></h5>
                        <div class="activity">
                            @if (isset($topcustomer))
                                @foreach ($topcustomer as $key => $customer)
                                    <div class="activity-item d-flex">
                                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'>Top
                                            {{ ++$key }}</i>
                                        <div class="activity-content">
                                            @php
                                                $dolaorder = $customer->total_Order / 23000;
                                            @endphp
                                            <h5> <b>{{ $customer->name }}</b> | {{ round($dolaorder, 2) }}$</h5>
                                        </div>
                                    </div><!-- End activity item-->
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Right side columns -->
        </div>
    </section>
@endsection
