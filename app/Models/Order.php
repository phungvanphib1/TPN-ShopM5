<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'id', 'customer_id', 'total', 'date_at', 'date_ship', 'note', 'status'
    ];
    protected $table = 'orders';
    function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    function orderDetails()
    {
        return $this->hasMany(order_detail::class, 'order_id', 'id');
    }
    public function scopeNameCus($query, $request)
    {
        if (isset($request['nameCus'])) {
            return $query->whereHas('customer', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request['nameCus'] . '%');
            });
        }
        return $query;
    }
    public function scopePhoneCus($query, $request)
    {
        if (isset($request['phoneCus'])) {
            return $query->whereHas('customer', function ($query) use ($request) {
                $query->where('phone', 'LIKE', '%' . $request['phoneCus'] . '%');
            });
        }
        return $query;
    }
    public function scopefilterTotal($query, array $total_to)
    {
        if (isset($total_to['startPrice']) && isset($total_to['endPrice'])) {
            $query->whereBetween('total', [$total_to['startPrice'], $total_to['endPrice']]);
        }
        return $query;
    }

    public function scopefilterDate($query, array $date_to_date)
    {
        if (isset($date_to_date['start_date']) && isset($date_to_date['end_date'])) {
            $query->whereBetween('date_at', [$date_to_date['start_date'], $date_to_date['end_date']]);
        }
        return $query;
    }
}
