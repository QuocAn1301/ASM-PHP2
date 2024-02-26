@extends('master.main')

@section('main')
<div class="login-register-area mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Tạo tài khoảng</h2>
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
                            <input name="name" type="text" placeholder="Tên của bạn">
                        </div>
                        <div class="single-input-item mb-3">
                            <input name="email" type="email" placeholder="Email của bạn">
                        </div>
                        <div class="single-input-item mb-3">
                            <input name="password" type="password" placeholder="Mật khẩu">
                        </div>
                        <div class="single-input-item mb-3">
                            <input name="confirm_password" type="password" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="single-input-item mb-3">
                            <button class="btn obrien-button-2 primary-color" type="submit">Đăng kí</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop