<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WishList extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'user_id'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
