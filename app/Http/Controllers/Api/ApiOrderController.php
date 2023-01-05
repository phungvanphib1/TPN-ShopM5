<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Services\Order\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * @property    ControllerDocumentManager   $documentManager
 */
class ApiOrderController extends Controller
{
    function __construct(private OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        try{
            return response()->json(200);
        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try{
        $order = new Order;
        $order->note = $request->note;
        $order->customer_id = $request->customer_id;
        $order->total = 0;
        $order->status = 0;
        $order->date_at = null;
        $order->date_ship = null;
        $order->save();
        $carts = Cache::get('carts');
        $order_total_price = 0;
        foreach ($carts as $productId => $cart) {
            $order_total_price += $cart['price'] * $cart['quantity'];
            Order_detail::create([
                'price' => $cart['price'],
                'quantity' => $cart['quantity'],
                'product_id' => $productId,
                'order_id' => $order->id,
            ]);
            Product::where('id', $productId)->decrement('quantity', $cart['quantity']);
        }
        $id_order = $order->id;
        $order->total= $order_total_price;
        $order->save();
        Cache::forget('carts');
        $carts = Cache::get('carts');
        $customer = Customer::findOrFail($request->customer_id);
        $order = $this->orderService->find($id_order);
        $orderDetails = $order->orderDetails;
        $params = [
            'order' => $order,
            'orderDetails' => $orderDetails,
            'total' => $order->total,
        ];

        Mail::send('mail.mailOders', compact('params'), function ($email) use($customer) {
            $email->subject('TPN-Shop');
            $email->to($customer->email,$customer->name);
        });

        return response()->json(Order::with(['orderDetails'])->find($order->id));
        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return response()->json(Order::with(['orderDetails' => function ($query) {
                return $query->with(['products']);
            }])->find($id));
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }

    public function listorder($id)
    {
        try {
            return response()->json(Customer::with(['orders' => function ($query) {
                return $query->with(['orderDetails' => function ($query) {
                    return $query->with(['products']);
                }]);
            }])->find($id));
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }
}
