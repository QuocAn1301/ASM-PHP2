@extends('master.dashboard')
@section('title', 'Tạo Tin Tức')
@section('main')
<form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-primary">
        <div class="card-header" style="background-color:#008B8B">
            <h3 class="card-title">Tạo tin tức</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea name="content" id="content" required class="form-control" rows="6"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5 mr-5">
                    <label for="image">Ảnh:</label>
                    <input type="file" name="image" id="imageInput">
                    <img id="previewImage" src="#" alt="Ảnh xem trước"
                        style="max-width: 100%; margin-top: 10px; display: none;">
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-sm">Add News</button>
            <a href="{{ route('news.index') }}" class="btn btn-danger btn-sm">Back</a>
        </div>
        <!-- /.card-body -->
    </div>
</form>
<script>
// Hàm thay đổi hình ảnh khi chọn tệp mới
document.getElementById('imageInput').onchange = function(evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function() {
            document.getElementById('previewImage').src = fr.result;
            document.getElementById('previewImage').style.display = 'block';
        }
        fr.readAsDataURL(files[0]);
    }
};
</script>
@stop