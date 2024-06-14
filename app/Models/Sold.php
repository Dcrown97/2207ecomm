<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sold extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sold';

    protected $fillable = [
        'sales_id',
        'product',
        'quantity',
        'price',
        'size_id',
    ];

    public function sales(){
        return $this->hasMany('App\Models\Sales', 'sales_id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id');
    }
}
