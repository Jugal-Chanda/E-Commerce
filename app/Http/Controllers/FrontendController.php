<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FrontendController extends Controller
{
    public function home()
    {
        return view('home',['categories'=>Category::all(),'products'=>Product::all()]);
    }
}
