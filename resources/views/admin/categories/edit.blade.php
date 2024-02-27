@extends('master.dashboard')
@section('title', 'Sửa danh mục')
@section('main')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Sửa danh mục</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form id="updateForm" action="{{ route('categories.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="name">Tên danh mục:</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}">
                <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Sửa</button>
            </form>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<script>
function confirmUpdate() {
    var result = confirm("Bạn có muốn sửa không?");
    if (result) {
        // Nếu người dùng chọn "Yes", submit form
        document.getElementById("updateForm").submit();
    } else {
        // Nếu người dùng chọn "No", không làm gì cả
    }
}
</script>

@stop