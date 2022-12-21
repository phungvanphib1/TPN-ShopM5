<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'id','customer_id','total','date_at','date_ship','note' ,'status'
    ];
    protected $table = 'orders';
    function customer(){
        return $this->belongsTo(Customer::class);
    }
    function orderDetails(){
        return $this->hasMany(order_detail::class, 'order_id', 'id');
    }
    public function scopeNameCate($query, $request)
    {
        if ($request->has('customer_id')) {
            return $query->whereHas('customer', function ($query) use ($request) {
                $query->where('customer_id', $request->customer_id);
            });
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
