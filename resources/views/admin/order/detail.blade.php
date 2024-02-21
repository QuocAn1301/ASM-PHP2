@extends('master.dashboard')
@section('title', 'Create Category')
@section('main')
<div class="cart-main-wrapper mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div>
                <table class="table">
                    <h3>Thông tin nhận hàng</h3>
                    <tbody>
                        <tr>
                            <td class="col-md-8">Tên người nhận</td>
                            <td class="col-md-3">{{$order->name}}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại người nhận</td>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ nhận</td>
                            <td>{{$order->address}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12">
                <h3>Thông tin đơn hàng</h3>
                <div class="cart-table table-responsive">


                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th class="pro-thumbnail">STT</th>
                                <!-- <th class="pro-title">Hình ảnh </th> -->
                                <th class="pro-title">Tên sản phẩm </th>
                                <th class="pro-title">Đơn giá</th>
                                <th class="pro-title">Số lượng</th>
                                <th class="pro-subtotal">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->details as $item)
                            <tr>
                                <td class="pro-thumbnail">{{ $loop->iteration }}</td>
                                <td class="pro-thumbnail">{{ $item->prod->name}}</td>
                                <td class="pro-thumbnail">{{ number_format($item->price) }} vnđ</td>
                                <td class="pro-thumbnail">{{ $item->quantity}}</td>
                                <td class="pro-thumbnail">{{number_format($item->quantity * $item->price)}} vnđ</td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                @if($order->status==1)
                <a href="{{ route('order.admin.update', ['order' => $order->id]) }}?status=2"
                    class="btn obrien-button primary-btn"> Hủy đơn</a>
                @else
                <a href="{{ route('order.admin.update', ['order' => $order->id]) }}?status=1"
                    class="btn obrien-button primary-btn"> Giao hàng</a>

                <a href="{{ route('order.admin.update', ['order' => $order->id]) }}?status=2"
                    class="btn obrien-button primary-btn"> Hủy đơn</a>
                @endif
            </div>
        </div>
    </div>
</div>
@stop