<!-- Form thêm sản phẩm -->
@extends('master.dashboard')
@section('main')
<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-header" style="background-color:#008B8B">
            <h3 class="card-title">Product Create</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-5 mr-5">
                    <label for="name">Tên Sản Phẩm:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group col-md-5">
                    <label for="category_id">Danh Mục:</label>
                    <select name="category_id" id="category_id" required class="form-control">
                        <!-- Lặp qua danh sách danh mục để hiển thị tùy chọn -->
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5 mr-5">
                    <label for="price">Giá:</label>
                    <input type="number" name="price" id="price" required class="form-control">
                </div>
                <div class="form-group col-md-5 =">
                    <label for="sale_price">Giá Khuyến Mãi:</label>
                    <input type="number" name="sale_price" id="sale_price" required class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5 mr-5">
                    <div class="form-group">
                        <label for="quantity">Số Lượng:</label>
                        <input type="number" name="quantity" id="quantity" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả:</label>
                        <textarea name="description" id="description" required class="form-control" rows="6"></textarea>
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <i class="fa-regular fa-image" style="font-size:250px; color:#008B8B"></i><br>
                    <input type="file" name="images[]" multiple required>
                </div>
            </div>
            <button type="submit" style="background-color:#008B8B;color:#fff; height:36px">Thêm Sản Phẩm</button>
            <a href="{{ route('products.index') }}" class="btn btn-primary"
                style="background-color: #DC143C; color: #fff;">Trở lại</a>
        </div>
        <!-- /.card-body -->
    </div>
</form>
@stop