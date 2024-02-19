<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return view('home.index',compact('products'));
    }
    public function product()
    {
        $products = Product::with('images')->get();
        return view('home.product',compact('products'));
    }
}