@extends('master.main')

@section('main')

<div class="cart-main-wrapper mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div>
                <table class="table">
                    <h3>Thông tin nhận hàng</h3>
                    <tbody>
                        <tr>
                            <td class="col-md-3">Tên người nhận</td>
                            <td class="col-md-8">{{$order->name}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">Số điện thoại người nhận</td>
                            <td class="col-md-8">{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <td class="col-md-3">Địa chỉ nhận</td>
                            <td class="col-md-8">{{$order->address}}</td>
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
        </div>
    </div>
</div>

@stop