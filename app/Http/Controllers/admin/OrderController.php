<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Order\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $orderService;
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->orderService->all($request);
        return view('admin.order.index', compact('orders'));
    }
    public function show($id)
    {
        $order = $this->orderService->find($id);
        $order_Details = $order->orderDetails;
        $params = [
            'order' => $order,
            'order_Details' => $order_Details,
        ];
        return view('admin.order.show', $params);
    }
    public function update(Request $request ,$id)
    {
       
        $order = Order::find($id);
        $order->status = $request->status;
        $notification = [
            'message' => 'Cập nhật đơn hàng thành công!',
            'alert-type' => 'success'
        ];
        $order->save();
        return redirect()->route('orders.index')->with($notification);
    }
}
