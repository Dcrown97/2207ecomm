<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'size',
        'measure',
        'quantity',
        'cost_ngn',
        'cost_dol',

    ];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
