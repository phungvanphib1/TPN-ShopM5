<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select(
                'customers.name as cateName',
                'customers.phone as catephone',
                'orders.note',
                'orders.total',
                'orders.date_at',
                'orders.status',
            )->get();
    }
    public function headings(): array
    {
        return ["Tên Khách Hàng", "Điện Thoại", "Ghi Chú", "Tổng Tiền Đơn","Ngày Đặt", "Trạng Thái"];
    }
}
