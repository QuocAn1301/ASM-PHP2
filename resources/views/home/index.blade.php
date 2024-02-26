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

<div class="latest-blog-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-5 m-auto text-center col-custom">
                <div class="section-content">
                    <h2 class="title-1 text-uppercase">Latest Blog</h2>
                    <div class="desc-content">
                        <p>If you want to know about the organic product then keep an eye on our blog.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-custom">
                <div class="obrien-slider slick-carousel-3 slick-initialized slick-slider" data-slick-options="{
                        &quot;slidesToShow&quot;: 3,
                        &quot;slidesToScroll&quot;: 1,
                        &quot;infinite&quot;: true,
                        &quot;arrows&quot;: false,
                        &quot;dots&quot;: false
                        }" data-slick-responsive="[
                        {&quot;breakpoint&quot;: 1200, &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 2
                        }},
                        {&quot;breakpoint&quot;: 992, &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 2
                        }},
                        {&quot;breakpoint&quot;: 768, &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 1
                        }},
                        {&quot;breakpoint&quot;: 576, &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 1
                        }}
                        ]">



                    @foreach($news as $blog)
                    <div class="single-blog slick-slide slick-active" data-slick-index="1" aria-hidden="false"
                        style="width: 494px;" tabindex="0">
                        <div class="single-blog-thumb">
                            <a class="d-block" href="{{ route('news.show', $blog->id) }}">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" />
                            </a>
                        </div>
                        <div class="single-blog-content position-relative">
                            <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                <span>{{ $blog->created_at->format('d') }}</span>
                                <span>{{ $blog->created_at->format('m') }}</span>
                            </div>

                            <div class="post-meta">
                                <span class="author">Author: Obrien Demo Admin</span>
                            </div>
                            <h4 class="title-2">
                                <a href="{{ route('news.show', $blog->id) }}">{{ $blog->title }}</a>
                            </h4>
                            </br>
                            <div class="desc-content">
                                <p>
                                    @php
                                    $content = $blog->content;
                                    $wordLimit = 20;
                                    $words = explode(" ", $content);
                                    $trimmedContent = implode(" ", array_splice($words, 0, $wordLimit));
                                    echo $trimmedContent . (count($words) > $wordLimit ? "..." : "");
                                    @endphp
                                </p>
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