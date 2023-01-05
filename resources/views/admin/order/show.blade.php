@extends('admin.layout.master')
@section('content')

<section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h2 class="offset-4">
                            Chi Tiết Đơn Hàng
                        </h2><br>
                        <table class="table table-bordered">
                            <td><b>Tên Khách Hàng:</b>{{ $order->customer->name }}</td>
                            <td><b>Địa chỉ :</b>             {{ $order->customer->address }}</td>
                            <td><b>Email :</b>             {{ $order->customer->email }}</td>
                            <td><b>SĐT :</b>             {{ $order->customer->phone }}</td>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">GIá(Đồng)</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Tổng Tiền(Đồng)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach ($order_Details as $key => $order_Detail)
                                @php $total += $order_Detail->quantity * $order_Detail->price  @endphp
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $order_Detail->products->name }}</td>
                                        <td>{{ number_format($order_Detail->price) }}</td>
                                        <td>{{ $order_Detail->quantity }}</td>
                                        <td>{{ number_format($order_Detail->quantity * $order_Detail->price ) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h4 style="color: red"><strong>Tổng Tiền Đơn Hàng: {{number_format($total)}} vnd</strong></h4><hr>
                        <form action="{{ route('orders.update',$order->id) }}" method="POST"  >
                                    @csrf
                                    @method('put')
                        <label><h5><b>Trạng thái :</b></h5></label>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0" 
                                    {{ $order->status == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Chờ duyệt</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1" 
                                    {{ $order->status == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Duyệt</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="2" 
                                    {{ $order->status == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio3">Hủy đơn</label>
                                </div>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                        <hr>
                        <div>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay Lại</a><br>
                        </div>
                        <div style="float:right">
                            {{-- {{ $order_Details->onEachSide(5)->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
