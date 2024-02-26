@extends('master.main')
@section('title', 'Login')
@section('main')
<!-- Login Area Start Here -->
<div class="login-register-area mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Lấy lại mật khẩu</h2>
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
                            <button class="btn obrien-button-2 primary-color" type="submit">Gửi email xác nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Area End Here -->
@stop