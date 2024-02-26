@extends('master.main')

@section('main')
<!-- Login Area Start Here -->
<div class="login-register-area mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Đăng nhập</h2>

                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="single-input-item mb-3">
                            <input name="email" type="email" placeholder="Nhập email của bạn">
                        </div>
                        <div class="single-input-item mb-3">
                            <input name="password" type="password" placeholder="Nhập mật khẩu của bạn">
                        </div>
                        <div class="single-input-item mb-3">
                            <button class="btn obrien-button-2 primary-color" type="submit">Đăng nhập</button>
                        </div>
                        <div class="single-input-item mb-3">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                <a href="{{ route('account.forgot_password') }}" class="forget-pwd mb-3">Quên mật
                                    khẩu?</a>
                            </div>
                        </div>
                        <div class="single-input-item">
                            <a href="{{ route('account.register') }}">Tạo tài khoảng</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Area End Here -->
@stop