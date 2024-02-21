@extends('master.main')

@section('main')

<div class="cart-main-wrapper mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $item)
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                            src="{{ asset('storage/' . $item->prod->images[0]->image) }}"
                                            style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #000;"
                                            alt="Product"></a>
                                </td>

                                <td class="pro-title">{{$item->prod->name}} </td>
                                <td class="pro-price"><span>{{$item->price}}</span></td>
                                <td class="pro-quantity">
                                    <!-- <div class="quantity">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" value="{{$item->quantity}}" type="text">
                            <div class="dec qtybutton">-</div>
                            <div class="inc qtybutton">+</div>
                        </div>
                    </div> -->
                                    <form action="{{ route('cart.update', $item->product_id) }}" method="POST"
                                        class="quantity-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input name="quantity" class="cart-plus-minus-box"
                                                    value="{{ $item->quantity }}" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                        <!-- Remove the "Cập nhật" (Update) button -->
                                    </form>

                                </td>
                                <td class="pro-subtotal"><span>{{$item->quantity * $item->price}}</span></td>
                                <td class="pro-remove"><a href="{{route('cart.index')}}"
                                        onclick="confirmDelete('{{ route('cart.delete', $item->product_id) }}')">
                                        <i class="ion-trash-b"></i>
                                    </a></td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="cart-update mt-sm-16">
                            <a href="{{route('cart.index')}}" class="btn obrien-button primary-btn"
                                onclick="confirmDeletee('{{ route('cart.clear') }}')">Xóa hết sản phẩm</a>
                        </div>
                        <div class="cart-update mt-sm-16">
                            <a href="{{route('order.checkout')}}" class="btn obrien-button primary-btn">Thanh toán</a>
                        </div>
                        <div class="cart-update mt-sm-16">
                            <a href="#" class="btn obrien-button primary-btn">Tiếp tục mua sắm</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
function confirmDeletee(url) {
    if (confirm("Bạn có chắc chắn muốn xóa hết sản phẩm không?")) {
        window.location.href = url;
    }
}
</script>


<script>
function confirmDelete(deleteUrl) {
    if (confirm("Bạn có chắc chắn muốn xóa không?")) {
        window.location.href = deleteUrl;
    }
}
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Listen for changes in the quantity input
    $('.cart-plus-minus-box').on('change', function() {
        // Submit the form when the quantity changes
        $(this).closest('form').submit();
    });

    // Optionally, you can also handle the increment and decrement buttons
    $('.dec.qtybutton, .inc.qtybutton').on('click', function() {
        // Submit the form when the user clicks the increment or decrement button
        $(this).closest('form').submit();
    });
});
</script>
@stop