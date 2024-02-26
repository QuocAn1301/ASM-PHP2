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
        $categoryOneProducts = Product::where('category_id',9)->get();
        return view('home.index',compact('products', 'categoryOneProducts'));
    }
    public function product()
{
    $products = Product::with('images')->get(); // Số lượng sản phẩm trên mỗi trang (ở đây là 12)
    $category_id = request('category_id');
    
    // Tạo query để lấy sản phẩm, nếu có category_id thì lọc theo danh mục, ngược lại lấy toàn bộ sản phẩm
    $query = Product::orderBy('id', 'DESC');
    if ($category_id !== null) {
        $query->where('category_id', $category_id);
    }
    $products = $query->paginate();

    return view('home.product', compact('products'));
}

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Tìm kiếm sản phẩm dựa trên tên hoặc mô tả
        $products = Product::where('name', 'like', "%$query%")
                            ->paginate(2);
    
        return view('home.search', compact('products'));
    }

public function loc(Request $request)
{

    $productsQuery = Product::query();
    if ($request->has('sort_by_price')) {
        $productsQuery->orderBy('sale_price', $request->sort_by_price);
    }
    if ($request->has('sort_by_name')) {
        $productsQuery->orderBy('name', $request->sort_by_name);
    }
    $products = $productsQuery->paginate(2);

    // Trả về view kèm theo thông tin phân trang và kết quả lọc
    return view('home.product', compact('products'));
}

}