@extends('master.main')

@section('main')

<div class="shop-wrapper">
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">

                        <h2>Kết quả tìm kiếm cho từ khóa "{{ request('query') }}"</h2>
                        </br>



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
                                    <select class="form-control nice-select w-100">
                                        <option selected value="1">Alphabetically, A-Z</option>
                                        <option value="2">Sort by popularity</option>
                                        <option value="3">Sort by newness</option>
                                        <option value="4">Sort by price: low to high</option>
                                        <option value="5">Sort by price: high to low</option>
                                        <option value="6">Product Name: Z</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!-- Shop Wrapper Start -->

                    <div class="container">
                        @if($products->count() == 0)
                        <h4>Không tìm thấy sản phẩm nào phù hợp.</h4>
                        @elseif($products->count() > 0)
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="product-image">
                                        <a class="d-block" href="{{ route('products.show', $product->id) }}">
                                            <img src="{{ asset('storage/' . $product->images[0]->image) }}"
                                                style="width: 345px; height: 400px; object-fit: cover" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Chi
                                            tiết</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @endif
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
                                <h3 class="widget-title">Menu Categories</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="mobile-menu p-0 m-0">
                                        <li class="menu-item-has-children"><a href="#">Breads</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Skateboard (02)</a></li>
                                                <li><a href="#">Surfboard (4)</a></li>
                                                <li><a href="#">Accessories (3)</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Fruits</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Samsome</a></li>
                                                <li><a href="#">GL Stylus (4)</a></li>
                                                <li><a href="#">Uawei (3)</a></li>
                                                <li><a href="#">Avocado (3)</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Vagetables</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Power Bank</a></li>
                                                <li><a href="#">Data Cable (4)</a></li>
                                                <li><a href="#">Avocado (3)</a></li>
                                                <li><a href="#">Brocoly (3)</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Organic Food</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Vagetables</a></li>
                                                <li><a href="#">Green Food (4)</a></li>
                                                <li><a href="#">Coconut (3)</a></li>
                                                <li><a href="#">Cabage (3)</a></li>
                                            </ul>
                                        </li>
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
    <!-- Shop Main Area End Here -->
    <!-- Support Area Start Here -->
    <!-- Support Area End Here -->

    <!-- Footer Area End Here -->
</div>

@stop