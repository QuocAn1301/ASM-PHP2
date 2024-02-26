<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
      
        $auth = auth('cus') ->user();
        return view('home.checkout', compact('auth'));
    }

    public function post_checkout(Request $reg){

        $auth = auth('cus')->user();
        $data = $reg->only('name','phone','address'); 
        $data['customer_id'] = $auth->id;
    
        if($order = Order::create($data)){
            foreach($auth->carts as $cart){
                $data1=[
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price'=> $cart->price,
                    'quantity' => $cart->quantity
                ];
                OrderDetail::create($data1);
            }
            return redirect()->route('home.index')->with('ok', 'Đặt hàng thành công');
            // Xóa sản phẩm khỏi giỏ hàng sau khi đặt hàng thành công
            $auth->carts()->delete();
        }
    }
    
    

    public function history(){
      
        $auth = auth('cus') ->user();
        return view('home.history', compact('auth'));
    }

    public function detail(Order $order){
      
        $auth = auth('cus') ->user();
        return view('home.detail', compact('auth','order'));
    }

    public function cancel($order)
{
    $order = Order::findOrFail($order);
    // Đảm bảo rằng đơn hàng thuộc về người dùng đăng nhập
    if ($order->customer_id != auth('cus')->id()) {
        return redirect()->back()->with('no', 'Bạn không có quyền hủy đơn hàng này.');
    }
    // Thực hiện các xử lý hủy đơn hàng ở đây
    $order->status = '3';
    $order->save();
    return redirect()->back()->with('ok', 'Đơn hàng đã được hủy thành công.');
}
}