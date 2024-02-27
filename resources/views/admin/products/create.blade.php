@extends('master.dashboard')
@section('title', 'Tạo sản phẩm')
@section('main')

<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-header" style="background-color:#008B8B">
            <h3 class="card-title">Tạo sản phẩm</h3>

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
                <div class="form-group col-md-5">
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
                    <label for="images">Chọn Ảnh:</label>
                    <input type="file" name="images[]" id="images" multiple required class="form-control-file">
                    <div id="selected-images" style="margin-top: 10px; display: flex; flex-wrap: wrap;"></div>
                    <!-- Hiển thị các ảnh đã chọn -->
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-sm">Thêm Sản Phẩm</button>
            <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm">Trở lại</a>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('input[name="images[]"]').addEventListener('change', function(event) {
        const files = event.target.files;
        const selectedImagesContainer = document.getElementById('selected-images');
        selectedImagesContainer.innerHTML = ''; // Xóa các ảnh đã hiển thị trước đó

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.marginRight = '10px'; // Khoảng cách giữa các hình ảnh cùng hàng
                img.style.marginBottom = '10px'; // Khoảng cách giữa các hàng
                img.width = 100; // Kích thước ảnh có thể điều chỉnh tùy ý
                img.height = 100;
                selectedImagesContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    });
});
</script>
@stop