@extends('master.main')

@section('main')
<div class="product-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-5 m-auto text-center col-custom">
                <div class="section-content">

                    <h2 class="title-1 text-uppercase">Sản phẩm mới nhất</h2>
                    <div class="desc-content">
                        <p>
                            Đây là những sản phẩm mới nhất của cửa hàng chúng tôi
                        </p>
                    </div>
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
                    @foreach($products as $product)
                    <div class="single-item">
                        <div class="single-product position-relative">
                            <div class="product-image">
                                <a class="d-block" href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ asset('storage/' . $product->images[0]->image) }}"
                                        style="width: 345px; height: 400px; object-fit: cover" />
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-title">
                                    <h4 class="title-2">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h4>
                                </div>
                                <div>
                                    <span class="regular-price "><b>{{ $product->sale_price }}</b></span>
                                    <span class="old-price"><del>{{ $product->price }}</del></span>
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
</br>

<div class="product-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-5 m-auto text-center col-custom">
                <div class="section-content">
                    <h2 class="title-1 text-uppercase">Sản phẩm bán chạy</h2>
                    <div class="desc-content">
                        <p>
                            Đây là những sản phẩm bán chạy nhất của cửa hàng chúng tôi
                        </p>
                    </div>
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
                    @foreach($categoryOneProducts as $product)
                    <div class="single-item">
                        <div class="single-product position-relative">
                            <div class="product-image">
                                <a class="d-block" href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ asset('storage/' . $product->images[0]->image) }}"
                                        style="width: 345px; height: 400px; object-fit: cover" />
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-title">
                                    <h4 class="title-2">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h4>
                                </div>
                                <div>
                                    <span class="regular-price "><b>{{ $product->sale_price }}</b></span>
                                    <span class="old-price"><del>{{ $product->price }}</del></span>
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

@stop