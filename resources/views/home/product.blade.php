@extends('master.main')

@section('main')

<div class="shop-wrapper">
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Shop Sidebar</h3>
                        <ul>

                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Shop Main Area Start Here -->
    <div class="shop-main-area">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                                title="3"><i class="fa fa-th"></i></button>
                            <!-- <button data-role="grid_4" type="button"  class=" btn-grid-4" data-bs-toggle="tooltip" title="4"></button> -->
                            <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                                title="List"><i class="fa fa-th-list"></i></button>
                        </div>
                        <div class="shop-select">
                            <form class="d-flex flex-column w-100" action="#">
                                <div class="form-group">
                                    <select id="sort-products" class="form-control">
                                        <option value="price_low_to_high">Price: Low to High</option>
                                        <option value="price_high_to_low">Price: High to Low</option>
                                        <option value="name_az">Name: A-Z</option>
                                        <option value="name_za">Name: Z-A</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_3">
                        @foreach($products as $product)
                        <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
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
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-title">
                                        <h4 class="title-2"> <a
                                                href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">{{ $product->sale_price }}</span>
                                        <span class="old-price"><del>{{ $product->price }}</del></span>
                                    </div>
                                </div>
                                <div class="product-content-listview">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-title">
                                        <h4 class="title-2"> <a
                                                href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </h4> <!-- Sửa link -->
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">{{ $product->sale_price }}</span>
                                        <span class="old-price"><del>{{ $product->price }}</del></span>
                                    </div>

                                    <p class="desc-content">
                                        {{ $product->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Shop Wrapper End -->
                    <!-- Bottom Toolbar Start -->
                    <div class="row">
                        <div class="col-sm-12 col-custom">
                            <div class="toolbar-bottom mt-30">
                                <nav class="pagination pagination-wrap mb-10 mb-sm-0">
                                    <div class="pagination-wrap mb-10 mb-sm-0">
                                        @if ($products->lastPage() > 1)
                                        <ul class="pagination">
                                            {{-- Nút trở lại --}}
                                            @if ($products->onFirstPage())
                                            <li class="disabled prev">
                                                <i class="ion-ios-arrow-thin-left"></i>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ $products->previousPageUrl() }}" title="Trở lại"><i
                                                        class="ion-ios-arrow-thin-left"></i></a>
                                            </li>
                                            @endif

                                            {{-- Các số trang --}}
                                            @php
                                            $currentPage = $products->currentPage();
                                            $lastPage = $products->lastPage();
                                            $start = max($currentPage - 3, 1);
                                            $end = min($currentPage + 3, $lastPage);
                                            @endphp

                                            @for ($i = $start; $i <= $end; $i++) <li
                                                class="{{ $i == $currentPage ? 'active' : '' }}">
                                                <a href="{{ $products->url($i) }}">{{ $i }}</a>
                                                </li>
                                                @endfor

                                                {{-- Nút tiếp theo --}}
                                                @if ($products->hasMorePages())
                                                <li>
                                                    <a href="{{ $products->nextPageUrl() }}" title="Tiếp theo"><i
                                                            class="ion-ios-arrow-thin-right"></i></a>
                                                </li>
                                                @else
                                                <li class="disabled next">
                                                    <i class="ion-ios-arrow-thin-right"></i>
                                                </li>
                                                @endif
                                        </ul>
                                        @endif
                                    </div>


                                </nav>
                                <p class="desc-content text-center text-sm-right">Hiển thị {{ $products->firstItem() }}
                                    - {{ $products->lastItem() }} trên tổng số {{ $products->total() }} kết quả</p>
                                <!-- Thêm hiển thị số kết quả -->
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Toolbar End -->
                </div>
                <div class="col-lg-3 col-12 col-custom">
                    <!-- Sidebar Widget Start -->
                    <aside class="sidebar_widget widget-mt">
                        <div class="widget_inner">
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Search</h3>
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Our Store"
                                            aria-label="Search Our Store">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Menu Categories</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="mobile-menu p-0 m-0">
                                        <!-- Thêm menu categories nếu cần -->
                                    </ul>
                                </nav>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Categories</h3>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">
                                        <li><a href="#">All Product</a></li>
                                        <li><a href="#">Best Seller (5)</a></li>
                                        <li><a href="#">Featured (4)</a></li>
                                        <li><a href="#">New Products (6)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var selectElement = document.getElementById('sort-products');

    selectElement.addEventListener('change', function() {
        var selectedOption = this.value;
        // Gửi yêu cầu lọc sản phẩm dựa trên lựa chọn của người dùng
        filterProducts(selectedOption);
    });

    function filterProducts(selectedOption) {
        // Sử dụng Ajax để gửi yêu cầu lọc đến máy chủ Laravel
        // Đảm bảo rằng bạn đã định nghĩa route và phương thức controller để xử lý yêu cầu này
        $.ajax({
            url: '/filter-products/' + selectedOption,
            type: 'GET',
            success: function(response) {
                // Cập nhật giao diện người dùng với sản phẩm đã lọc
                $('#products-container').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
});
</script>

@stop