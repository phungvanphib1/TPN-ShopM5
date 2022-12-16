<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];
    protected $fillable = ['name','price','quantity','description','category_id','view_count','image'];
    public function products()
    {
        return $this->belongsTo(Category::class);
    }
    public function image_products(){
        return $this->hasMany(Image_Product::class, 'product_id','id');
    }
    public function order_detail(){
        return $this->hasMany(order_detail::class, 'product_id','id');
    }

}
