@extends('master.dashboard')
@section('title', 'Category')
@section('main')

<div class="card" style="width: 600px;">
    <div class="card-header">
        <h3 class="card-title">Danh mục</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <a class="btn btn-primary btn-sm" href="{{ route('categories.create') }}">
        <i class="fas fa-folder"></i>
        Tạo danh mục
    </a>
    <div class="card-body p-0" style="display: block;">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">No</th>
                    <th style="width: 50%">Tên danh mục</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <p style="margin-bottom: 0rem;">{{ $category->name }}</p>
                    </td>
                    <td class="project-actions">
                        <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category->id) }}">
                            <i class="fas fa-pencil-alt"></i> Sửa
                        </a>
                        <form id="deleteForm_{{ $category->id }}"
                            action="{{ route('categories.destroy', $category->id) }}" method="post"
                            style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="button" class="btn btn-danger"
                                onclick="confirmDelete({{ $category->id }}, '{{ $category->name }}')">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<script>
function confirmDelete(categoryId, categoryName) {
    if (confirm('Bạn có chắc muốn xóa danh mục "' + categoryName + '" không?')) {
        // Giả sử bạn có một hàm để gửi biểu mẫu
        document.getElementById('deleteForm_' + categoryId).submit();
    }
}
</script>

@stop