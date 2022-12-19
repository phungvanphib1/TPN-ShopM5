<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','order_id','quantity','price' 
    ];
    protected $table = 'order_detail';
    function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    function orders(){
        return $this->belongsTo(Order::class,'total','id');
    }
}
