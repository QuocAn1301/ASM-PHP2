<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('customer_id',auth('cus')->id())->get();
        return view('home.cart',compact('carts'));
    }

    public function add(Product $product , Request $request )
    {
        $quantity = $request->input('quantity') ? floor($request->input('quantity')) : 1;

        $cus_id = auth('cus')->id();
        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id
        ])->first();
    
        if ($cartExist) {
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id
            ])->increment('quantity', $quantity);
        } else {
            $data = [
                'customer_id' => auth('cus')->id(),
                'product_id' => $product->id,
                'price' => $product->sale_price ? $product->sale_price : $product->price,
                'quantity' => $quantity
            ];
    
            if (Cart::create($data)) {
                return redirect()->route('cart.index')->with('ok', 'Thêm sản phẩm vào giỏ hàng thành công');
            }
        }
        return redirect()->route('cart.index')->with('ok', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
    

    public function update(Product $product , Request $reg )
    {
        $quantity = $reg->quantity ? floor($reg->quantity) :1 ;
       $cus_id = auth('cus')->id();
       $cartExist = Cart::where([
        'customer_id'=>$cus_id,
        'product_id'=>$product->id
       ])->first();

       if($cartExist){
        Cart::where([
            'customer_id'=>$cus_id,
            'product_id'=>$product->id
           ])->update(['quantity'=>$quantity]);
           return redirect()->back();
       }
       return redirect()->route('cart.index')->with('no', 'có lỗi xảy ra vui long thử lại');
    }

    public function delete($product_id)
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id'=>$cus_id,
            'product_id'=>$product_id
           ])->delete();
           return redirect()->route('cart.index')->with('ok', 'xóa sản phẩm khỏi giỏ hàng thành công');
    }
    
    public function clear()
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id'=>$cus_id
        ])->delete();
        return redirect()->route('cart.index')->with('ok', 'xóa tất cả sản phẩm khỏi giỏ hàng thành công');
    }
    
}