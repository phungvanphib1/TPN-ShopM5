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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image_products(){
        return $this->hasMany(Image_Product::class, 'product_id','id');
    }
    public function order_detail(){
        return $this->hasMany(order_detail::class, 'product_id','id');
    }


    public function scopeNameCate($query, $request)
    {
        if ($request->has('category_id')) {
            return $query->whereHas('category', function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            });
        }
        return $query;
    }
    public function scopeFilterPrice($query, array $filters)
    {
        if (isset($filters['startPrice']) && isset($filters['endPrice'])) {
            $query->whereBetween('price', [$filters['startPrice'], $filters['endPrice']]);
        }
        return $query;
    }
    public function scopefilterDate($query, array $date_to_date)
    {
        if (isset($date_to_date['start_date']) && isset($date_to_date['end_date'])) {
            $query->whereBetween('created_at', [$date_to_date['start_date'], $date_to_date['end_date']]);
        }
        return $query;
    }

}
