@extends('master.dashboard')

@section('main')
<form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-header" style="background-color:#008B8B">
            <h3 class="card-title">Tạo tài khoảng</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="price">Tên:</label>
                    <input name="name" type="text" placeholder="Tên của bạn" required class="form-control">
                    <label for="sale_price">Email:</label>
                    <input name="email" type="email" placeholder="Email của bạn" required class="form-control">
                    <label for="password">Mật khẩu :</label>
                    <input name="password" type="password" placeholder="Mật khẩu của bạn" class="form-control">
                    <label for="confirm_password">Nhập lại mật khẩu:</label>
                    <input name="confirm_password" type="password" placeholder="Nhập lại mật khẩu" class="form-control">

                </div>
            </div>
            <button type="submit" style="background-color:#008B8B;color:#fff; height:36px">Thêm người dùng</button>
            <a href="{{ route('customers.index') }}" class="btn btn-primary"
                style="background-color: #DC143C; color: #fff;">Trở lại</a>
        </div>
        <!-- /.card-body -->
    </div>
</form>

@stop