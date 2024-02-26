<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;

use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index(){
        $status = request('status',0);
        $orders = Order::orderBy('id','DESC')-> where('status', $status)->paginate();
        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order){
        $auth = $order->customer;
        return view('admin.order.detail', compact('auth','order'));
    }

    public function update(Order $order){
        $status = request('status',0);
        $order->update(['status' => $status]);
        return redirect()->route('order.index')->with('ok','cập nhập đơn hàng thành công');
    }

    public function updatep(Order $order){
        $pay = request('pay',1);
        $order->update(['pay' => $pay]);
        return redirect()->route('order.index')->with('ok','cập nhập đơn hàng thành công');
    }
 
}