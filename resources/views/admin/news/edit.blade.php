<!-- Form chỉnh sửa tin tức -->
@extends('master.dashboard')
@section('main')
<form id="updateForm" action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="card card-primary">
        <div class="card-header" style="background-color:#008B8B">
            <h3 class="card-title">Chỉnh Sửa Tin Tức</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-5 mr-5">
                    <label for="title">Tiêu đề:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="content">Nội dung:</label>
                    <textarea name="content" id="content" required class="form-control"
                        rows="6">{{ $news->content }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5 mr-5">
                    <label for="image">Ảnh:</label>
                    <input type="file" name="image" id="imageInput">
                    <!-- Hiển thị ảnh cũ -->
                    <img id="oldImage" src="{{ asset('storage/' . $news->image) }}" alt="Old Image"
                        style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                </div>
            </div>
            <button type="submit" name="submitBtn" class="btn btn-primary"
                style="background-color:#008B8B;color:#fff">Cập Nhật Tin Tức</button>
            <a href="{{ route('news.index') }}" class="btn btn-primary"
                style="background-color: #DC143C; color: #fff;">Quay Lại</a>
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
            document.getElementById('oldImage').src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
};
</script>
@stop