<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'file_path',
        'description',
        'posted'
    ];

    protected $with = ['images'];

    public  function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'product_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'product_id');
    }

    public function sizes()
    {
        return $this->hasMany('App\Models\Size', 'product_id');
    }

    public function specifications()
    {
        return $this->hasMany('App\Models\Specification', 'product_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'product_tag');
    }
}
