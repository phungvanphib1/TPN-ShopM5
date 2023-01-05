<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\Order\OrderServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    private $orderService;
    private $customerService;
    public function __construct(OrderServiceInterface $orderService, CustomerServiceInterface $customerService)
    {
        $this->orderService = $orderService;
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        // $orders = $this->orderService->all($request);
        $productnew = Product::take(5)->get();
        $users = User::get();
        $totalCustomer  =  Customer::pluck('id')->count();
        $totalUser  =  User::pluck('id')->count();
        $totalOrders  =  Order::pluck('id')->count();
        $totalPrice  =  Order::pluck('total')->sum();
        $orderWait = $this->orderService->orderWait()->count();
        $orderBrowser = $this->orderService->orderBrowser()->count();
        $orderCancel = $this->orderService->orderCancel()->count();
        $orders = DB::table('order_detail')
        ->join('products', 'products.id', '=', 'order_detail.product_id')
        ->leftJoin('orders', 'orders.id', '=', 'order_detail.order_id')
        ->selectRaw('products.*, products.name name_Product, products.category_id cate_id ,sum(order_detail.price) total_Price')
        ->groupBy('order_detail.product_id')
        ->groupBy('order_detail.order_id')
        ->orderBy('name_Product', 'desc')
        ->take(5)
        ->get();
        $topproduct = DB::table('order_detail')
        ->leftJoin('products', 'products.id', '=', 'order_detail.product_id')
        ->selectRaw('products.*, sum(order_detail.quantity) total_Product, sum(order_detail.price) total_Price')
        ->groupBy('order_detail.product_id')
        ->orderBy('total_Product', 'desc')
        ->take(5)
        ->get();
        $topcustomer = DB::table('customers')
            ->join('orders', 'customers.id', '=', 'orders.customer_id')
            ->selectRaw('customers.*, sum(orders.total) total_Order')
            ->groupBy('customers.id')
            ->orderBy('total_Order', 'desc')
            ->take(5)
            ->get();
        $params = [
            'productnew' => $productnew,
            'orderWait'=> $orderWait,
            'orderBrowser' => $orderBrowser,
            'orderCancel' => $orderCancel,
            'users' => $users,
            'totalUser' => $totalUser,
            'totalCustomer' => $totalCustomer,
            'totalPrice' => $totalPrice,
            'totalOrders' => $totalOrders,
            'topproduct' => $topproduct,
            'topcustomer'=> $topcustomer,
            'orders'=> $orders
        ];
        return view('admin.dashboar', $params);
    }
}
