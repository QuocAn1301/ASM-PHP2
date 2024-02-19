@extends('master.dashboard')

@section('main')

<form action="{{ route('customers.update', $customers->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card card-primary" style=" width:600px">
        <div class="card-header" style="background-color:#008B8B;">
            <h3 class="card-title">Sửa tài khoảng</h3>
        </div>
        <div class="card-body ">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-row ">
                <div class="form-group col-md-10">
                    <label for="price">Tên:</label>
                    <input name="name" type="text" class="form-control" value="{{ $customers->name }}">
                    <label for="sale_price">Email:</label>
                    <input name="email" value="{{$customers->email}}" type="email" class="form-control">
                    <label for="price">phone:</label>
                    <input name="phone" type="text" value="{{$customers->phone}}" class="form-control">
                    <label for="price">address:</label>
                    <input name="address" value="{{$customers->address}}" type="text" class="form-control">
                    <label for="price">Giới tính:</label>
                    <select name="gender" id="" style="margin-top:15px;margin-bottom:15px">
                        <option value="1" {{$customers->gender==1 ? 'selected': ''}}>Nam</option>
                        <option value="0" {{$customers->gender==0 ? 'selected': ''}}>Nữ</option>
                    </select><br>
                    <label for="price">Role:</label>
                    <select name="role" id="">
                        <option value="1" {{$customers->role == 1 ? 'selected': ''}}>User</option>
                        <option value="0" {{$customers->role == 0 ? 'selected': ''}}>Admin</option>
                    </select><br>

                    <label for="price">Ngày xác minh email:</label>
                    <input name="email_verified_at" type="date"
                        value="{{ $customers->email_verified_at ? date('Y-m-d', strtotime($customers->email_verified_at)) : '' }}"
                        class="form-control">

                </div>
            </div>
            <button type="submit" style="background-color:#008B8B;color:#fff; height:36px">Sửa tài khoảng</button>
            <a href="{{ route('customers.index') }}" class="btn btn-primary"
                style="background-color: #DC143C; color: #fff;">Trở lại</a>
        </div>
        <!-- /.card-body -->
    </div>
</form>

@stop