<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
     protected $fillable = [
         'user_id',
         'size_id',
         'product_id',
         'status'
     ];

     public function user(){
         return $this->belongsTo('App\Models\User', 'user_id');
     }

     public function item(){
         return $this->belongsTo('App\Models\Size', 'size_id');
     }
}
