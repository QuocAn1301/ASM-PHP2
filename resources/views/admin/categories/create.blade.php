<!-- resources/views/categories/create.blade.php -->
@extends('master.dashboard')
@section('title', 'Tạo danh mục')
@section('main')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tạo danh mục</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 10px;background-color: #f54e4e;">
            <ul style="margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body" style="display: flex; align-items: center;">
            <div class="card-body" style="display: flex; align-items: center;">
                <form action="{{ route('categories.store') }}" method="post" style="margin-right: 10px;">
                    @csrf
                    <label for="name">Tên danh mục:</label>
                    <input type="text" name="name" id="name">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tạo
                    </button>
                </form>
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Trở lại</a>
            </div>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@stop