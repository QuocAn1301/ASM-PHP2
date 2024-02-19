@extends('master.dashboard')
@section('title', 'Product')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Products</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <a class="btn btn-primary btn-sm" href="{{ route('products.create') }}">
            <i class="fas fa-folder"></i> Create
        </a>

        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 20%">Name</th>
                    <th style="width: 15%">Price</th>
                    <th style="width: 7%">Quantity</th>
                    <th style="width: 15%">Category</th>
                    <th style="width: 23%">Images</th>
                    <th style="width: 20%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        @foreach($product->images as $productImage)
                        <img src="{{ asset('storage/' . $productImage->image) }}"
                            style="width: 50px; height: 50px; object-fit: cover; margin-right: 5px;">
                        @endforeach
                    </td>
                    <td class="project-actions">
                        <a class="btn btn-info btn-sm" href="{{ route('products.edit', $product->id) }}">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <form id="deleteForm_{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}"
                            method="post" style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="button" class="btn btn-danger"
                                onclick="confirmDelete({{ $product->id }}, '{{ $product->name }}')">
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
function confirmDelete(productsId, productsName) {
    if (confirm('Bạn có chắc muốn xóa danh mục "' + productsName + '" không?')) {
        // Giả sử bạn có một hàm để gửi biểu mẫu
        document.getElementById('deleteForm_' + productsId).submit();
    }
}
</script>


@stop