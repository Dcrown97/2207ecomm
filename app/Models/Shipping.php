<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'shipping';

    protected $fillable = [
        'location',
        'cost_dol',
        'cost_ngn'
    ];
}
