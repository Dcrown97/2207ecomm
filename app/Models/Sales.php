<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'ref',
        'total',
        'shipping',
        'coupon',
        'currency',
        'status',
        'notes'
    ];

    public function items(){
        return $this->hasMany('App\Models\Sold', 'sales_id');
    }

    public function billing(){
        return $this->hasOne('App\Models\Address', 'sales_id')->where('type', '=','billing');
    }

    public function ship(){
        return $this->hasOne('App\Models\Address', 'sales_id')->where('type', '=','shipping');
    }

    public function loc(){
        return $this->belongsTo('App\Models\Shipping', 'shipping');
    }

    public function cou(){
        return $this->belongsTo('App\Models\Coupon', 'coupon', 'code');
    }
}
