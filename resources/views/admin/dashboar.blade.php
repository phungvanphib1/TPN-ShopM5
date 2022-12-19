@extends('admin.layout.master')
@section('content')
    <div class="pagetitle">
        <h1>Trang Tổng Quan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Tổng Quan</a></li>
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </nav>
    </div>
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
                                        <h6>145</h6>
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
                                        <h6>$3,264</h6>
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
                                        <h6>1244</h6>
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
                                        <h6>3</h6>
                                        <span class="text-success small pt-1 fw-bold">1</span> <span
                                            class="text-muted small pt-2 ps-1">SuperAdim</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Customers Card -->
                    <!-- Reports -->
                    <div class="col-lg-8">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Báo cáo <span>/Ngày</span></h5>
                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Sales',
                                                    data: [31, 40, 28, 51, 42, 82, 56],
                                                }, {
                                                    name: 'Revenue',
                                                    data: [11, 32, 45, 32, 34, 52, 41]
                                                }, {
                                                    name: 'Customers',
                                                    data: [15, 11, 32, 18, 9, 24, 11]
                                                }],
                                                chart: {
                                                    height: 350,
                                                    type: 'area',
                                                    toolbar: {
                                                        show: false
                                                    },
                                                },
                                                markers: {
                                                    size: 4
                                                },
                                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                                fill: {
                                                    type: "gradient",
                                                    gradient: {
                                                        shadeIntensity: 1,
                                                        opacityFrom: 0.3,
                                                        opacityTo: 0.4,
                                                        stops: [0, 90, 100]
                                                    }
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    curve: 'smooth',
                                                    width: 2
                                                },
                                                xaxis: {
                                                    type: 'datetime',
                                                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                                        "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                                        "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                                        "2018-09-19T06:30:00.000Z"
                                                    ]
                                                },
                                                tooltip: {
                                                    x: {
                                                        format: 'dd/MM/yy HH:mm'
                                                    },
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>

                            </div>
                        </div>
                        <!-- End Reports -->
                        <!-- Top Selling -->
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
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/product-1.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa
                                                        voluptas
                                                        nulla</a></td>
                                                <td>$64</td>
                                                <td class="fw-bold">124</td>
                                                <td>$5,828</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                        <!-- End Top Selling -->
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
                                                <th scope="col">Trạng Thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#">#2457</a></th>
                                                <td>Brandon Jacob</td>
                                                <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                                <td>$64</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2147</a></th>
                                                <td>Bridie Kessler</td>
                                                <td><a href="#" class="text-primary">Blanditiis dolor omnis
                                                        similique</a></td>
                                                <td>$47</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2049</a></th>
                                                <td>Ashleigh Langosh</td>
                                                <td><a href="#" class="text-primary">At recusandae consectetur</a>
                                                </td>
                                                <td>$147</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2644</a></th>
                                                <td>Angus Grady</td>
                                                <td><a href="#" class="text-primar">Ut voluptatem id earum et</a>
                                                </td>
                                                <td>$67</td>
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2644</a></th>
                                                <td>Raheem Lehner</td>
                                                <td><a href="#" class="text-primary">Sunt similique distinctio</a>
                                                </td>
                                                <td>$165</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
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
                                <h5 class="card-title">Báo cáo lượt truy cập <span>| Tháng</span></h5>
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
                                                name: 'Lượt truy cập',
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
                                                        value: 228,
                                                        name: 'Tìm kiếm'
                                                    },
                                                    {
                                                        value: 35,
                                                        name: 'Vào thẳng'
                                                    },
                                                    {
                                                        value: 94,
                                                        name: 'Xem sản phẩm'
                                                    },
                                                    {
                                                        value: 10,
                                                        name: 'Video quảng cáo'
                                                    }
                                                ]
                                            }]
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <!-- End Website Traffic -->

                    </div>
                    <!-- End Right side columns -->
                </div>
    </section>
@endsection
