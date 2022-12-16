<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'groups';
    protected $fillable = ['name'];
    function users()
    {
        return $this->hasMany(User::class);
    }
    function roles()
    {
        return $this->belongsToMany(Role::class,'role_group');
    }
    // public function scopeSearch($query)
    // {
    //     if ($key = request()->key) {
    //         $query = $query->where('name', 'like', '%' . $key . '%');
    //     }
    //     return $query;
    // }
}
