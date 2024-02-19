<!-- Form thêm sản phẩm -->
@extends('master.dashboard')
@section('main')
<form id="updateForm" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="card card-primary">
        <div class="card-header" style="background-color:#008B8B">
            <h3 class="card-title">Product Edit</h3>

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
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group col-md-5">
                    <label for="category_id">Danh Mục:</label>
                    <select name="category_id" id="category_id" required class="form-control">
                        <!-- Lặp qua danh sách danh mục để hiển thị tùy chọn -->
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected
                            @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5 mr-5">
                    <label for="price">Giá:</label>
                    <input type="number" name="price" id="price" required class="form-control"
                        value="{{ $product->price }}">
                </div>
                <div class="form-group col-md-5">
                    <label for="sale_price">Giá Khuyến Mãi:</label>
                    <input type="number" name="sale_price" id="sale_price" required class="form-control"
                        value="{{ $product->sale_price }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5 mr-5">
                    <div class="form-group">
                        <label for="quantity">Số Lượng:</label>
                        <input type="number" name="quantity" id="quantity" required class="form-control"
                            value="{{ $product->quantity }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả:</label>
                        <textarea name="description" id="description" required class="form-control"
                            rows="6">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <i class="fa-regular fa-image" style="font-size:250px; color:#008B8B"></i><br>
                    <input type="file" name="images[]" multiple required>
                </div>
            </div>
            <button type="button" name="submitBtn" class="btn btn-primary" onclick="confirmUpdate()"
                style="background-color:#008B8B;color:#fff">Sửa Sản Phẩm</button>
            <a href="{{ route('products.index') }}" class="btn btn-primary"
                style="background-color: #DC143C; color: #fff;">Trở lại</a>
        </div>
        <!-- /.card-body -->
    </div>
</form>
<script>
function confirmUpdate() {
    var result = confirm("Bạn có muốn sửa sản phẩm này không?");
    if (result) {
        // Nếu người dùng chọn "Yes", submit form
        document.getElementById("updateForm").submit();
    } else {
        // Nếu người dùng chọn "No", không làm gì cả
    }
}
</script>
@stop