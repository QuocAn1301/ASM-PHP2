<!-- Form chỉnh sửa sản phẩm -->
@extends('master.dashboard')
@section('title', 'Sửa sản phẩm')
@section('main')
<form id="updateForm" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="card card-primary">
        <div class="card-header" style="background-color:#008B8B">
            <h3 class="card-title">Sửa Sản Phẩm</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
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
                    <label for="images">Hình Ảnh:</label>
                    <div class="image-preview" style="display: flex;">
                        @foreach($product->images as $productImage)
                        <div class="preview-item" style="margin-right: 10px;">
                            <img src="{{ asset('storage/' . $productImage->image) }}"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>
                    </br>
                    <input type="file" name="images[]" id="images" required multiple>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-sm">Sửa Sản Phẩm</button>
            <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm">Hủy</a>
        </div>
    </div>
</form>

<script>
document.getElementById('images').addEventListener('change', function(event) {
    var fileList = event.target.files;
    var previewContainer = document.querySelector('.image-preview');
    previewContainer.innerHTML = '';
    if (fileList) {
        Array.from(fileList).forEach(function(file) {
            var reader = new FileReader();
            reader.onload = function() {
                var previewItem = document.createElement('div');
                previewItem.classList.add('preview-item');
                previewItem.style.marginRight = '10px';
                var img = document.createElement('img');
                img.src = reader.result;
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                previewItem.appendChild(img);
                previewContainer.appendChild(previewItem);
            }
            reader.readAsDataURL(file);
        });
    }
});
</script>
@stop