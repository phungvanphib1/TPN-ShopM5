<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'gso_id'];
    public function district()
    {
        return $this->hasMany(Districts::class);
    }
    function users()
    {
        return $this->hasMany(User::class,'province_id','id');
    }
}
