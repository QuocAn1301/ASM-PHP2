@extends('master.main')

@section('main')
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Thanh toán</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkout-area">
    <div class="container container-default-2 custom-container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="" method="post">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Thông tin người nhận</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div class="country-select clearfix">
                                    <label>Country <span class="required">*</span></label>
                                    <select class="myniceselect nice-select wide rounded-0" style="display: none;">
                                        <option data-display="Bangladesh">Bangladesh</option>
                                        <option value="uk">London</option>
                                        <option value="rou">Romania</option>
                                        <option value="fr">French</option>
                                        <option value="de">Germany</option>
                                        <option value="aus">Australia</option>
                                    </select>
                                    <div class="nice-select myniceselect wide rounded-0" tabindex="0"><span
                                            class="current">Bangladesh</span>
                                        <ul class="list">
                                            <li data-value="Bangladesh" data-display="Bangladesh"
                                                class="option selected">Bangladesh</li>
                                            <li data-value="uk" class="option">London</li>
                                            <li data-value="rou" class="option">Romania</li>
                                            <li data-value="fr" class="option">French</li>
                                            <li data-value="de" class="option">Germany</li>
                                            <li data-value="aus" class="option">Australia</li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Tên người nhận <span class="required">*</span></label>
                                    <input value="{{$auth->name}}" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input value="{{$auth->address}}" name="address" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input value="{{$auth->phone}}" name="phone" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="order-button-payment">
                            <input value="Đặt hàng" type="submit">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="cart-product-total">Tổng cộng </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($auth->carts as $item)
                                <tr class="cart_item">
                                    <td class="cart-product-name"> {{$item->prod->name}}

                                        × {{$item->quantity}}</td>
                                    <td class="cart-product-total text-center"><span
                                            class="amount">{{$item->quantity * $item->price}} VND</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                @php
                                $orderTotal = 0; // Initialize total order amount variable
                                @endphp

                                @foreach($auth->carts as $item)
                                @php
                                $orderTotal += $item->quantity * $item->price; // Calculate total order amount
                                @endphp
                                @endforeach

                                <tr class="order-total">
                                    <th>Tổng cộng</th>
                                    <td class="text-center"><strong><span class="amount">{{ $orderTotal }}
                                                VND</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop