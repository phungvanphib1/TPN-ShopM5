<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
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
}
