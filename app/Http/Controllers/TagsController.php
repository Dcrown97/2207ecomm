<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    //
    public function index(){
        $tags = Tag::all();
        return view('products.tags', ['tags'=>$tags]);
    }
}
