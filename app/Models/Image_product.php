<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image_product extends Model
{
    use HasFactory;
    protected $table = 'image_products';
    protected $fillable = [
        'product_id','image'
    ];
    public function products(){
        return $this->belongsTo(products::class);
    }
}
