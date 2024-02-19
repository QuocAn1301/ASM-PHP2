<!-- resources/views/categories/create.blade.php -->
@extends('master.dashboard')
@section('title', 'Create Category')
@section('main')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">General</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" required>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Create
                </button>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@stop