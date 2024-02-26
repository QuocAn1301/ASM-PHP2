<!DOCTYPE html>
<html class="no-js" lang="en">
<!-- Mirrored from template.hasthemes.com/obrien/obrien/{{ route('home.index') }} by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2023 02:17:11 GMT -->

<head>
    <base href="/">
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="uploads/favicon.ico" />

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css" />
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css" />
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css" />

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->

    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Thêm SweetAlert CSS -->
    <!-- Thêm SweetAlert CSS từ CDN -->



    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>

    <div class="home-wrapper home-1">
        <!-- Header Area Start Here -->
        <header class="main-header-area">
            <!-- Header Top Area Start Here -->
            <div class="header-top-area">
            </div>
            <!-- Header Top Area End Here -->
            <!-- Main Header Area Start -->
            <div class="main-header">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-12 col-custom">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                                    <div class="header-logo d-flex align-items-center">
                                        <a href="{{ route('home.index') }}">
                                            <img class="img-full" src="uploads/logo/logo.png" alt="Header Logo" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 position-static d-none d-lg-block col-custom">
                                    <nav class="main-nav d-flex justify-content-center">
                                        <ul class="nav">
                                            <li>
                                                <a class="active" href="{{ route('home.index') }}">
                                                    <span class="menu-text"> Trang chủ</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="active" href="{{ route('home.product') }}"
                                                    previewlistener="true">
                                                    <span class="menu-text">Sản phẩm</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">

                                                    <li><a href="{{ route('home.product') }}?category_id=16"
                                                            previewlistener="true">Chăm sóc da</a></li>
                                                    <li><a href="{{ route('home.product') }}?category_id=9"
                                                            previewlistener="true">Chăm sóc tóc</a></li>
                                                    <li><a href="{{ route('home.product') }}?category_id=10"
                                                            previewlistener="true">Chăm sóc cơ thể</a></li>
                                                </ul>
                                            </li>

                                            <!-- <li>
                                                <a href="blog-details-fullwidth.html">
                                                    <span class="menu-text"> Blog</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">
                                                    <li><a href="blog.html">Blog Left Sidebar</a></li>
                                                    <li>
                                                        <a href="blog-list-right-sidebar.html">Blog List Right
                                                            Sidebar</a>
                                                    </li>
                                                    <li><a href="blog-list-fullwidth.html">Blog List Fullwidth</a></li>
                                                    <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                                    <li>
                                                        <a href="blog-grid-right-sidebar.html">Blog Grid Right
                                                            Sidebar</a>
                                                    </li>
                                                    <li><a href="blog-grid-fullwidth.html">Blog Grid Fullwidth</a></li>
                                                    <li><a href="blog-details-sidebar.html">Blog Details Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-details-fullwidth.html">Blog Details Fullwidth</a>
                                                    </li>
                                                </ul>
                                            </li> -->
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-2 col-xl-4 col-sm-6 col-6 col-custom" style="width: 250px;">
                                    <div class="search-container">
                                        <form action="{{ route('home.search')}}" method="GET">
                                            <input type="text" name="query" placeholder="Tìm kiếm sản phẩm...">
                                            <button type="submit" class="search-button"><i
                                                    class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-3 col-sm-6 col-6 col-custom">
                                    <div class="header-right-area main-nav">
                                        <ul class="nav">
                                            @if(auth('cus')->check())
                                            <li class="login-register-wrap d-none d-xl-flex">
                                                <span>Xin chào
                                                    {{auth('cus')->user()->name}}
                                                    <ul class="dropdown-submenu dropdown-hover">
                                                        <li><a href="{{ route('account.profile') }}">Hồ sơ</a></li>
                                                        <li><a href="{{ route('order.history') }}">Lịch sử đặt hàng</a>
                                                        </li>
                                                        <li><a href="{{ route('account.change_password') }}">Đổi mật
                                                                khẩu</a></li>
                                                    </ul>
                                                </span>
                                                <span><a href="{{ route('account.logout') }}">Đăng xuất</a></span>
                                            </li>
                                            @else
                                            <li class="login-register-wrap d-none d-xl-flex">
                                                <span><a href="{{ route('account.login') }}">Đăng nhập</a></span>
                                                <span><a href="{{ route('account.register') }}">Đăng kí</a></span>
                                            </li>
                                            @endif
                                            <li class="minicart-wrap">
                                                <a href="{{ route('cart.index') }}" class="minicart-btn toolbar-btn">
                                                    <i class="ion-bag"></i>
                                                    <!-- <span class="cart-item_count"></span> -->
                                                </a>
                                                <!-- <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2"> -->
                                                <!-- <div class="single-cart-item">
                                                        <div class="cart-img">
                                                            <a href="cart.html"><img src="uploads/cart/1.jpg"
                                                                    alt="" /></a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <h5 class="title">
                                                                <a href="cart.html">11. Product with video - navy</a>
                                                            </h5>
                                                            <div class="cart-text-btn">
                                                                <div class="cart-qty">
                                                                    <span>1×</span>
                                                                    <span class="cart-price">$98.00</span>
                                                                </div>
                                                                <button type="button"><i
                                                                        class="ion-trash-b"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-cart-item">
                                                        <div class="cart-img">
                                                            <a href="cart.html"><img src="uploads/cart/2.jpg"
                                                                    alt="" /></a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <h5 class="title">
                                                                <a href="cart.html"
                                                                    title="10. This is the large title for testing large title and there is an image for testing - white">10.
                                                                    This is the large title for testing...</a>
                                                            </h5>
                                                            <div class="cart-text-btn">
                                                                <div class="cart-qty">
                                                                    <span>1×</span>
                                                                    <span class="cart-price">$98.00</span>
                                                                </div>
                                                                <button type="button"><i
                                                                        class="ion-trash-b"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-cart-item">
                                                        <div class="cart-img">
                                                            <a href="cart.html"><img src="uploads/cart/3.jpg"
                                                                    alt="" /></a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <h5 class="title">
                                                                <a href="cart.html">1. New and sale badge product - s /
                                                                    red</a>
                                                            </h5>
                                                            <div class="cart-text-btn">
                                                                <div class="cart-qty">
                                                                    <span>1×</span>
                                                                    <span class="cart-price">$98.00</span>
                                                                </div>
                                                                <button type="button"><i
                                                                        class="ion-trash-b"></i></button>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                <!-- <div class="cart-price-total d-flex justify-content-between">
                                                        <h5>Total :</h5>
                                                        <h5>$166.00</h5>
                                                    </div>
                                                    <div class="cart-links d-flex justify-content-center">
                                                        <a class="obrien-button white-btn"
                                                            href="{{ route('cart.index') }}">View
                                                            cart</a>
                                                        <a class="obrien-button white-btn"
                                                            href="checkout.html">Checkout</a>
                                                    </div>
                                                </div> -->
                                            </li>
                                            <li class="mobile-menu-btn d-lg-none">
                                                <a class="off-canvas-btn" href="#">
                                                    <i class="fa fa-bars"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('main') <div class="support-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-12 col-custom">
                            <div class="support-wrapper d-flex">
                                <div class="support-content">
                                    <h1 class="title">Cần trợ giúp ?</h1>
                                    <p class="desc-content">Gọi để hỗ trợ 24/7 0365 298 174</p>
                                </div>
                                <div class="support-button d-flex align-items-center">
                                    <a class="obrien-button primary-btn" href="https://www.facebook.com/VQA01">Kết nối
                                        ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Area Start Here -->
            <footer class="footer-area">
                <div class="footer-widget-area">
                    <div class="container container-default custom-area">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                                <div class="single-footer-widget m-0">
                                    <div class="footer-logo">
                                        <a href="{{ route('home.index') }}">
                                            <img src="uploads/logo/footer.png" alt="Logo Image" />
                                        </a>
                                    </div>
                                    <p class="desc-content">
                                        Obrien is the best parts shop of your daily nutritions. What kind of nutrition
                                        do you need you can get here soluta nobis
                                    </p>
                                    <div class="social-links">
                                        <ul class="d-flex">
                                            <li>
                                                <a class="border rounded-circle" href="#" title="Facebook">
                                                    <i class="fa fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="border rounded-circle" href="#" title="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="border rounded-circle" href="#" title="Linkedin">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="border rounded-circle" href="#" title="Youtube">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="border rounded-circle" href="#" title="Vimeo">
                                                    <i class="fa fa-vimeo"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                                <div class="single-footer-widget">
                                    <h2 class="widget-title">Information</h2>
                                    <ul class="widget-list">
                                        <li><a href="about-us.html">Our Company</a></li>
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                        <li><a href="about-us.html">Our Services</a></li>
                                        <li><a href="about-us.html">Why We?</a></li>
                                        <li><a href="about-us.html">Careers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                                <div class="single-footer-widget">
                                    <h2 class="widget-title">Quicklink</h2>
                                    <ul class="widget-list">
                                        <li><a href="about-us.html">About</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                                <div class="single-footer-widget">
                                    <h2 class="widget-title">Support</h2>
                                    <ul class="widget-list">
                                        <li><a href="contact-us.html">Online Support</a></li>
                                        <li><a href="contact-us.html">Shipping Policy</a></li>
                                        <li><a href="contact-us.html">Return Policy</a></li>
                                        <li><a href="contact-us.html">Privacy Policy</a></li>
                                        <li><a href="contact-us.html">Terms of Service</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                                <div class="single-footer-widget">
                                    <h2 class="widget-title">See Information</h2>
                                    <div class="widget-body">
                                        <address>
                                            123, H2, Road #21, Main City, Your address goes here.<br />Phone: 01254 698
                                            785, 36598 254 987<br />Email: https://example.com
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </footer>
    </div>

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery Migrate JS -->
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <!-- Ajax JS -->
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <!-- Jquery Ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- jquery magnific popup js -->
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    @if(Session::has('ok'))
    <script>
    $.toast({
        heading: 'Thông báo',
        text: "{{Session::get('ok')}}",
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-center',
        hideAfter: 3000,
    })
    </script>
    @endif
    @if(Session::has('no'))
    <script>
    $.toast({
        heading: 'Thông báo',
        text: "{{Session::get('no')}}",
        showHideTransition: 'slide',
        icon: 'error',
        position: 'top-center',
        hideAfter: 3000,
    })
    </script>
    @endif
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from template.hasthemes.com/obrien/obrien/{{ route('home.index') }} by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2023 02:17:55 GMT -->

</html>