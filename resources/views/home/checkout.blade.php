@extends('master.main')

@section('main')
<div class="checkout-area">
    <div class="container container-default-2 custom-container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="" method="post">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
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
                                    <label>Name <span class="required">*</span></label>
                                    <input value="{{$auth->name}}" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input value="{{$auth->address}}" name="address" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input value="{{$auth->phone}}" name="phone" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="order-button-payment">
                            <input value="Place order" type="submit">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($auth->carts as $item)
                                <tr class="cart_item">
                                    <td class="cart-product-name"> {{$item->prod->name}}<strong
                                            class="product-quantity">
                                            × {{$item->quantity}}</strong></td>
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
                                    <th>Order Total</th>
                                    <td class="text-center"><strong><span class="amount">{{ $orderTotal }}
                                                VND</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="#payment-1">
                                        <h5 class="panel-title mb-2">
                                            <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Direct Bank Transfer.
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body mb-2 mt-2">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-2">
                                        <h5 class="panel-title mb-2">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Cheque Payment
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body mb-2 mt-2">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="#payment-3">
                                        <h5 class="panel-title mb-2">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                PayPal
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body mb-2 mt-2">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop