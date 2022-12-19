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
                        </h2><br>
                        <a class="btn btn-info" href="#"> Xuất file exel </a>
                        <a class="btn btn-warning" href="#"> Tìm chi tiết </a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Khách Hàng</th>
                                    <th scope="col">Số Điện Thoại</th>
                                    <th scope="col">Ghi Chú</th>
                                    <th scope="col">Ngày Đặt</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td></td>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->customer->phone }}</td>
                                        <td>{{ $order->note }}</td>
                                        <td>{{ $order->date_at }}</td>
                                        <td>
                                        @if ($order->status === 0)
                                            <h4 style="color: silver"><i class="bi bi-bookmark-plus-fill"></i></h4>
                                        @endif
                                        @if ($order->status === 1 )

                                            <h4 style="color: green"><i class="bi bi-bookmark-check-fill"></i></h4>

                                        @endif
                                        @if ($order->status === 2 )

                                            <h4 style="color: red"><i class="bi bi-bookmark-x-fill"></i></h4>
                                        @endif
                                        </td>
                                        <td><a  class='btn btn-warning' href="{{route('orders.show',$order->id)}}">Chi tiết</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float:right">
                            {{ $orders->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
