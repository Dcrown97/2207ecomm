<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'user_id',
        'sales_id',
        'type',
        'first',
        'last',
        'company',
        'email',
        'phone',
        'country',
        'street1',
        'street2',
        'city',
        'state',
        'postal'
    ];

    public function sales(){
        return $this->belongsTo('App\Model\Sales', 'sales_id');
    }

    public function user(){
        return$this->belongsTo('App\Model\User', 'user_id');
    }

}
