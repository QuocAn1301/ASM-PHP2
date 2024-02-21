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
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Tìm kiếm sản phẩm dựa trên tên hoặc mô tả
        $products = Product::where('name', 'like', "%$query%")
                            ->get();
    
        return view('home.search', compact('products'));
    }
}