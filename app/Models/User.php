<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'address',
        'email',
        'password',
        'phone',
        'birthday',
        'image',
        'gender',
        'province_id',
        'district_id',
        'ward_id',
        'group_id',
    ];
    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function districts()
    {
        return $this->belongsTo(District::class, 'province_id', 'id');
    }
    public function wards()
    {
        return $this->belongsTo(Ward::class, 'province_id', 'id');
    }

    public function groups()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    // public function scopeSearch($query, $key)
    // {
    //     if ($key) {
    //         $query->where('name', 'like', '%' . $key . '%')
    //             ->orWhere('group_id', 'like', '%' . $key . '%')
    //             ->orWhere('id', 'like', '%' . $key . '%');
    //     }
    //     return $query;
    // }
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id_ad', 'id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
