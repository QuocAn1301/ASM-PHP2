@extends('master.main')

@section('main')
<div class="login-register-area mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Profile</h2>
                        <p class="desc-content">Please Register using account detail bellow.</p>
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
                            <input name="name" value="{{ $auth->name }}" type="text" placeholder="Tên của bạn">
                        </div>
                        <div class="single-input-item mb-3">
                            <input name="email" value="{{$auth->email}}" type="email" placeholder="Email của bạn">
                        </div>
                        <div class="single-input-item mb-3">
                            <input name="phone" value="{{$auth->phone}}" type="text"
                                placeholder="số điện thoại của bạn">
                        </div>
                        <div class="single-input-item mb-3">
                            <input name="address" value="{{$auth->address}}" type="text" placeholder="địa chỉ của bạn">
                        </div>
                        <div class="single-input-item mb-3">
                            <select name="gender" id="">
                                <option value="1" {{$auth->gender==1 ? 'selected': ''}}>Nam</option>
                                <option value="0" {{$auth->gender==0 ? 'selected': ''}}>Nữ</option>
                            </select>
                        </div>
                        <div class="single-input-item mb-3">
                            <button class="btn obrien-button-2 primary-color" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop