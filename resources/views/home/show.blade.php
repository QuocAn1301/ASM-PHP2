@extends('master.main')

@section('main')

<body>

    <div class="shop-wrapper">
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Chi tiết sản phẩm</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Single Product Main Area Start -->
        <div class="single-product-main-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-4 col-custom" style="margin-left:30px;margin-right:30px">
                        <div class="product-details-img horizontal-tab">
                            <div class="product-slider popup-gallery product-details_slider" data-slick-options='{
                        "slidesToShow": 1,
                        "arrows": false,
                        "fade": true,
                        "draggable": false,
                        "swipe": false,
                        "asNavFor": ".pd-slider-nav"
                        }'>
                                <div class="single-image border">
                                    <a href="{{ asset('storage/' . $product->images[0]->image) }}">
                                        <img src="{{ asset('storage/' . $product->images[0]->image) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="single-image border">
                                    <a href="{{ asset('storage/' . $product->images[1]->image) }}">
                                        <img src="{{ asset('storage/' . $product->images[1]->image) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="single-image border">
                                    <a href="{{ asset('storage/' . $product->images[2]->image) }}">
                                        <img src="{{ asset('storage/' . $product->images[2]->image) }}" alt="Product">
                                    </a>
                                </div>
                                <div class="single-image border">
                                    <a href="{{ asset('storage/' . $product->images[3]->image) }}">
                                        <img src="{{ asset('storage/' . $product->images[3]->image) }}" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <div class="pd-slider-nav product-slider" data-slick-options='{
                        "slidesToShow": 4,
                        "asNavFor": ".product-details_slider",
                        "focusOnSelect": true,
                        "arrows" : false,
                        "spaceBetween": 30,
                        "vertical" : false
                        }' data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                            {"breakpoint":1200, "settings": {"slidesToShow": 4}},
                            {"breakpoint":992, "settings": {"slidesToShow": 4}},
                            {"breakpoint":575, "settings": {"slidesToShow": 3}}
                        ]'>
                                <div class="single-thumb border">
                                    <img src="{{ asset('storage/' . $product->images[0]->image) }}"
                                        alt="Product Thumnail">
                                </div>
                                <div class="single-thumb border">
                                    <img src="{{ asset('storage/' . $product->images[1]->image) }}"
                                        alt="Product Thumnail">
                                </div>
                                <div class="single-thumb border">
                                    <img src="{{ asset('storage/' . $product->images[2]->image) }}"
                                        alt="Product Thumnail">
                                </div>
                                <div class="single-thumb border">
                                    <img src="{{ asset('storage/' . $product->images[3]->image) }}"
                                        alt="Product Thumnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-custom">
                        <div class="product-summery position-relative">
                            <div class="product-head mb-3">
                                <h2 class="product-title">{{ $product->name }}</h2>
                            </div>
                            <div class="price-box mb-2">
                                <span class="regular-price">{{ $product->sale_price }}đ</span>
                                <span class="old-price"><del>{{ $product->price }}đ</del></span>
                            </div>
                            <div class="product-rating mb-3">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="sku mb-3">
                                <span>SKU: 12345</span>
                            </div>
                            <p class="desc-content mb-5">{{ $product->description }}</p>
                            <div class="quantity-with_btn mb-4">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="quantity" value="1" type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </div>
                                    <button type="submit">Thêm vào giỏ hàng</button>
                                </form>


                                <!-- Trong view sản phẩm -->





                            </div>
                            <div class="buy-button mb-5">
                                <a href="{{ route('cart.add', $product->id) }}"
                                    class="btn obrien-button-3 black-button">Mua ngay</a>
                            </div>
                            <div class="social-share mb-4">
                                <span>Share :</span>
                                <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                                <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                                <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                                <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                            </div>
                            <div class="payment">
                                <a href="#"><img class="border" src="uploads/payment/img-payment.png" alt="Payment"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Single Product Main Area End -->
        <!-- Product Area Start Here -->
        <div class="product-area mb-no-text">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Sản phẩm liên quan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 product-wrapper col-custom">
                        <div class="product-slider" data-slick-options='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": false,
                        "dots": false
                        }' data-slick-responsive='[
                        {"breakpoint": 1200, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint": 992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>

                            @foreach($relatedProducts as $relatedProduct)
                            <div class="single-item">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="{{ route('products.show', $relatedProduct->id) }}">
                                            <img src="{{ asset('storage/' . $relatedProduct->images[0]->image) }}"
                                                style="width: 345px; height: 400px; object-fit: cover" />
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <!-- Bổ sung phần xếp hạng sản phẩm nếu có -->
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2">
                                                <a
                                                    href="{{ route('products.show', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a>
                                            </h4>
                                        </div>
                                        <div>
                                            <span class="regular-price "><b>{{ $relatedProduct->sale_price }}</b></span>
                                            <span class="old-price"><del>{{ $relatedProduct->price }}</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- <script>
        $(document).ready(function() {
            // Xử lý sự kiện khi nút "+" được nhấn
            $('.inc.qtybutton').click(function() {
                var inputBox = $(this).siblings('.cart-plus-minus-box');
                var currentValue = parseInt(inputBox.val());

                // Kiểm tra giá trị tối đa (nếu có)
                // Nếu không có giá trị tối đa, bạn có thể bỏ qua bước kiểm tra này
                var maxValue = 10; // Đặt giá trị tối đa tại đây

                if (!isNaN(maxValue) && currentValue >= maxValue) {
                    alert('Đã đạt giới hạn số lượng!');
                    return;
                }

                inputBox.val(currentValue + 1);
            });

            // Xử lý sự kiện khi nút "-" được nhấn
            $('.dec.qtybutton').click(function() {
                var inputBox = $(this).siblings('.cart-plus-minus-box');
                var currentValue = parseInt(inputBox.val());

                // Kiểm tra giá trị tối thiểu (nếu có)
                // Nếu không có giá trị tối thiểu, bạn có thể bỏ qua bước kiểm tra này
                var minValue = 1; // Đặt giá trị tối thiểu tại đây

                if (!isNaN(minValue) && currentValue <= minValue) {
                    alert('Số lượng không thể nhỏ hơn ' + minValue + '!');
                    return;
                }

                inputBox.val(currentValue - 1);
            });
        });
        </script> -->

        @stop