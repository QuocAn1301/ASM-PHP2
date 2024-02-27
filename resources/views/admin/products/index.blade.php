@extends('master.dashboard')
@section('title', 'Sản phẩm')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sản phẩm</h3>

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
            <i class="fas fa-folder"></i> Tạo sản phẩm
        </a>

        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 20%">Tên sản phẩm</th>
                    <th style="width: 15%">GIá</th>
                    <th style="width: 7%">Số lượng</th>
                    <th style="width: 15%">Danh mục</th>
                    <th style="width: 23%">Ảnh sản phẩm</th>
                    <th style="width: 20%">Hành động</th>
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
                            <i class="fas fa-pencil-alt"></i> Sửa
                        </a>
                        <form id="deleteForm_{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}"
                            method="post" style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button type="button" class="btn btn-danger btn-sm"
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

    <style>
    .pagination {
        display: flex;
        justify-content: center;
    }

    .pagination li {
        margin: 0 5px;
        list-style: none;
        display: inline-block;
    }

    .pagination li a {
        padding: 5px 10px;
        border: 1px solid #ddd;
        color: #333;
        text-decoration: none;
        border-radius: 3px;
    }

    .pagination li.active a {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination li a:hover {
        background-color: #f5f5f5;
    }
    </style>

    @if ($products->lastPage() > 1)
    <nav>
        <ul class="pagination justify-content-center">
            @php
            $currentPage = $products->currentPage();
            $lastPage = $products->lastPage();
            $start = max($currentPage - 3, 1);
            $end = min($currentPage + 3, $lastPage);
            @endphp

            @for ($i = $start; $i <= $end; $i++) <li class="{{ $i == $currentPage ? 'active' : '' }}">
                <a href="{{ $products->url($i) }}">{{ $i }}</a>
                </li>
                @endfor
        </ul>
    </nav>
    @endif
    <p class="desc-content text-center text-sm-right" style="margin-right:30px">
        Hiển thị {{ $products->firstItem() }} -
        {{ $products->lastItem() }} trên tổng số {{ $products->total() }} kết quả</p>

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