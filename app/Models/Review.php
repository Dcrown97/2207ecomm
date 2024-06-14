<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'rating',
        'name',
        'email',
        'phone',
        'message',
    ];

    public function products(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
