<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|unique:products|max:100',
            'price' => 'numeric',
            'sale_price' => 'numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'quantity' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create product
        $product = Product::create($request->except('images'));

        // Upload images
        foreach ($request->file('images', []) as $image) {
            $path = $image->store('uploads', 'public');
            ProductImage::create([
                'image' => $path,
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('products.index')->with('ok', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = $product->category->products()->where('id', '!=', $product->id)->take(4)->get();
    
        return view('home.show', compact('product', 'relatedProducts'));
    }
    



    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required|unique:products,name,'.$id.'|max:100',
            'price' => 'required|numeric',
            'sale_price' => 'numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'quantity' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Update product
        $product = Product::findOrFail($id);
        $product->update($request->except('images'));
        
        // Xóa ảnh cũ chỉ khi có ảnh mới được thêm vào
        if ($request->hasFile('images')) {
            // Xóa ảnh cũ
            ProductImage::where('product_id', $product->id)->delete();
        
            // Upload new images
            foreach ($request->file('images', []) as $image) {
                $path = $image->store('uploads', 'public');
                ProductImage::create([
                    'image' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }
        
        return redirect()->route('products.index')->with('ok', 'Product updated successfully.');
        
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        // Xóa tất cả hình ảnh liên quan đến sản phẩm
        $product->images()->delete();
    
        // Tiếp theo, xóa sản phẩm
        $product->delete();
    
        return redirect()->route('products.index')->with('ok', 'Product deleted successfully');
    }
    

    

}