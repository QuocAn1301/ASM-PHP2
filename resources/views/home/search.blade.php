<!-- Trong tệp resources/views/products/search.blade.php -->
@extends('master.main')

@section('main')
<div class="container">
    <h2>Kết quả tìm kiếm cho từ khóa "{{ request('query') }}"</h2>

    @if($products->count() > 0)
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>Không tìm thấy sản phẩm nào phù hợp.</p>
    @endif
</div>
@stop